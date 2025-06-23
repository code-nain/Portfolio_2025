<?php
	require_once 'coolsms.php';
	session_start();

	// 230323 fakeSMS 기능 - true면 문자받기 / false면 문자인증 없이 자동인증
	// index.php 에 1줄 수정 필요
	// 에서 : $("#cellverify_auth_code").val('');
	// 으로 : $("#cellverify_auth_code").val(json.data.auth_code);
	// 다음 아래 2개 함수 수정필
	$is_real_verify = 1;

	//$callables = array('sendAuthCode');
	if (in_array($action = $_REQUEST['action'], $callables)) $action();

	if( $action == "sendAuthCode" ) {
		sendAuthCode();
	}
	else if( $action == "smsAuthCheck" ) {
		session_start();
		verifyAuthCode();
	}


	function getCellNumber() {
		return sprintf('%s%s%s', $_REQUEST['mobile1'], $_REQUEST['mobile2'], $_REQUEST['mobile3']);
	}

	function generateAuthCode($cell_number) {
		$code = sprintf('%04d', mt_rand(0, 9999));

		$_SESSION['CELLVERIFY_AUTH_CODE'][$cell_number] = $code;

		return $code;
	}

	// 230323 기능 수정 for fakeSMS
	function sendAuthCode() {
		session_start();

		global $is_real_verify;

		if ($_SESSION['CELLVERIFY_SENT_TIME'][getCellNumber()] > 0 &&  time() - $_SESSION['CELLVERIFY_SENT_TIME'][getCellNumber()] < 10)
			return printJSON(0, '최근 10초 이내에 동일 휴대폰 번호로 인증 번호가 발송된 이력이 있습니다. 잠시 후 다시 시도해 주세요.');

		$message = <<<EOL
인증번호: %s
EOL;

		$apikey = 'NCSQKZ9KOLSF9ICY';
		$apisecret = 'BTLFZ1MWYKGGDSKAQSTL6E5FZWELU0BS';

		// initiate rest api sdk object
		$oCoolsms = new coolsms($apikey, $apisecret);

		$options = new StdClass();
		$options->timestamp = (string)time();

	 	$oCoolsms->get_senderid_list();
	 	$result = $oCoolsms->getResult(); 
	 	if (!is_array($result) || !count($result)) return;

		$options->from = "01025674411";
		$options->to = getCellNumber();
		$auth_code = generateAuthCode($options->to);
		$options->text = sprintf($message, $auth_code);
		$options->type = 'SMS'; // SMS, MMS, LMS, ATA
		$options->srk = 'K0001002886';
		$allowedNumbers = ['01088889999', '01099999999', '01088888888', '01000001111']; // 허용된 번호 목록
	
		if ($is_real_verify) {
			// send messages
			$response = $oCoolsms->send($options);

			// get result 
			$result = $response->getResult();
			
			if ($response->getError()) return printJSON(-1, $response->getError());
		}

		$_SESSION['CELLVERIFY_SENT_TIME'][getCellNumber()] = time();
		
		if (!in_array($options->to, $allowedNumbers)) {
			return printJSON(2, '인증번호가 발송되었습니다.', array('is_real_verify' => $is_real_verify, 'auth_code' => $is_real_verify ? null : $auth_code));
		} 
		else {
			// 231115 수정
			return printJSON(2, '인증번호가 발송되었습니다.$$to:'.$options->to.'|from:'.$options->from.'|text:'.$options->text.'code:'.$auth_code,  array('is_real_verify' => $is_real_verify, 'auth_code' => $is_real_verify ? null : $auth_code));
		}
	}

	function verifyAuthCode() {
		if ($_SESSION['CELLVERIFY_AUTH_CODE'][getCellNumber()] !== $_REQUEST['cellverify_auth_code']) {
			return printJSON(-1, '인증 번호 불일치');
		}
		else{
			return printJSON(1, '인증 번호 일치');
		}
	}

	// 230323 기능 수정 for fakeSMS
	function printJSON($error, $message, $data = array()) {
		$json =  json_encode(array(
			'error' => $error,
			'message' => $message,
			'data' => (object)$data,
		));

		if ($_REQUEST['rich']) {
			printf('%s(%s)', $_REQUEST['rich'], $json);
		} else {
			echo $json;
		}

		exit();
	}

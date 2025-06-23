<?php
// 버전 : 1.5
// 최종 수정일 : 2024-02-26
?><?php
	session_start();
	if ($_GET['action'] == 'sendAuthCode') {
		$regdate = date('YmdHis');
		$customer_name = $_GET['customer_name'];
		$mobile1 = $_REQUEST['mobile1'];
		$mobile2 = $_REQUEST['mobile2'];
		if($customer_name == '' or $mobile1 == '' or $mobile2 == '' ){
			//echo('fail');
			return;
		}

		// 생년월일 6자리 입력시 8자리로 변환
		$birthday = $_GET['birthday'];
		if( strlen($birthday) == 6 ) {
			$b_year = substr($birthday,0,2);
			if( (int)$b_year >= 30 ) 
				$birthday = '19'.$birthday;
			else
				$birthday = '20'.$birthday;
		}
		
		// 보험료 산출 클릭시 (문자인증 전) DB 전송 (is_sms_verified = 'N')
		$insert_id = file_get_contents(
			'http://idb.kro.kr/receivepotential.php?'.http_build_query(array_merge(
				$_GET,
				$_POST,
				array(
					'ipaddress' => $_SERVER['REMOTE_ADDR'],
					'location' => $_SERVER['HTTP_REFERER'],
					'sex' => $_GET['sex'] == '1' ? 'M' : 'F',
					'name' => $_GET['customer_name'],
					'cellphone' => sprintf('%s%s%s', $_REQUEST['mobile1'], $_REQUEST['mobile2'], $_REQUEST['mobile3']),
					'regdate' => $regdate,
					'birthday' => $birthday,
				)
			))
		);


		$_SESSION['insert_id'] = $insert_id;
		echo $insert_id;

		// 랜딩 방문 횟수별 보험료 산출 클릭 수 계산 (랜딩 전환률 계산)
		file_get_contents(
			'http://ip.wkwk.kr/enhanced_click_log.php?'.http_build_query(array_merge(
				array(
					'converted' => 1,
					'uuid' => $_COOKIE['INFLOW_UUID'],
				)
			))
		);
		// 문자인증 후 DB 전송 (is_sms_verified = 'Y')
	} else if ($_GET['action'] == 'smsAuthCheck') {
		echo file_get_contents(
			'http://idb.kro.kr/receivepotential.php?'.http_build_query(array_merge(
				array(
					'insert_id' => $_SESSION['insert_id'],
				)
			))
		);
	}

<?php
// 버전 : 1.5
// 최종 수정일 : 2024-02-26
?><?php if ($_GET['script']): header('Content-Type: application/javascript'); ?>
	
document.addEventListener("DOMContentLoaded", function() {
	const INFLOW_UUID = 'INFLOW_UUID'

	function setCookie(name, value, exp) {
	    var date = new Date();
	    date.setTime(date.getTime() + exp * 24 * 60 * 60 * 1000);
	    document.cookie = name + '=' + escape(value) + ';expires=' + date.toUTCString() + ';path=/';
	};

	function getCookie(cookie_name) {
	    var x, y;
	    var val = document.cookie.split(';');
	    for (var i = 0; i < val.length; i++) {
	        x = val[i].substr(0, val[i].indexOf('='));
	        y = val[i].substr(val[i].indexOf('=') + 1);
	        x = x.replace(/^\s+|\s+$/g, '');
	        // 앞과 뒤의 공백 제거하기
	        if (x == cookie_name) {
	            return unescape(y);
	            // unescape로 디코딩 후 값 리턴
	        }
	    }
	}

	function generateUUID() { // Public Domain/MIT
	    var d = new Date().getTime();//Timestamp
	    var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now()*1000)) || 0;//Time in microseconds since page-load or 0 if unsupported
	    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
	        var r = Math.random() * 16;//random number between 0 and 16
	        if(d > 0){//Use timestamp until depleted
	            r = (d + r)%16 | 0;
	            d = Math.floor(d/16);
	        } else {//Use microseconds since page-load if supported
	            r = (d2 + r)%16 | 0;
	            d2 = Math.floor(d2/16);
	        }
	        return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
	    });
	}

	let uuid = getCookie(INFLOW_UUID);
	// 유입 고유번호가 셋팅되어 있지 않다면 90일짜리 쿠키로 유입 고유번호를 넣어줌
	if (!getCookie(INFLOW_UUID)) {
		uuid = generateUUID()
		setCookie(INFLOW_UUID, uuid, 90);
	}

	const formEl = document.createElement('form');
	const iframeEl = document.createElement('iframe');
	const inputHrefEl = document.createElement('input');
	const inputSrcEl = document.createElement('input');
	const inputRefererEl = document.createElement('input');
	const inputUuidEl = document.createElement('input');

	formEl.method = 'get';
	formEl.action = './click_send.php';
	formEl.target = 'click_send';

	formEl.appendChild(inputHrefEl);
	formEl.appendChild(inputSrcEl);
	formEl.appendChild(inputRefererEl);
	formEl.appendChild(inputUuidEl);

	inputHrefEl.type = 'hidden';
	inputHrefEl.name = 'href';
	inputHrefEl.value = location.href;
	inputSrcEl.type = 'hidden';
	inputSrcEl.name = 'src';
	// inputSrcEl.value = this.querySelector('img').src;
	inputRefererEl.type = 'hidden';
	inputRefererEl.name = 'referer';
	inputRefererEl.value = document.referrer;
	inputUuidEl.name = 'uuid';
	inputUuidEl.value = uuid;

	iframeEl.name = 'click_send';

	document.body.appendChild(iframeEl);
	document.body.appendChild(formEl);

	formEl.submit();

	formEl.remove();
	setTimeout(function() {
		iframeEl.remove();
	}, 100)
});
<?php exit(); endif; 
	$curl = curl_init();

	$_GET['ipaddress'] = $_SERVER['REMOTE_ADDR'];
	$_GET['useragent'] = $_SERVER['HTTP_USER_AGENT'];

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'http://ip.wkwk.kr/enhanced_click_log.php?'.http_build_query($_GET),
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	  CURLOPT_HTTPHEADER => array(
	  ),
	));

	$response = curl_exec($curl);

	if (curl_errno($ch)) {
	    $error_msg = curl_error($ch);
	    echo $error_msg;
	}

	curl_close($curl);
	echo $response;
?>

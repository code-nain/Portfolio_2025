<?php
/* Copyright (C) NAVER <http://www.navercorp.com> */
/* 181023 DB 연속 입력 방지2 - 사이트, 이름만으로 중복 제거 */
/**
 * @file  index.php
 * @author NAVER (developers@xpressengine.com)
 * @brief Start page
 *
 * @mainpage XpressEngine
 * @section intro introduction
 *
 * "XpressEngine (XE)" is an opensource and being developed in the opensource project.\n
 * For more information, please see the link below.
 * - Official website: http://www.xpressengine.com
 * - Offcial Repository: https://github.com/xpressengine/xe-core
 * \n
 * "XpressEngine (XE)" is free software; you can redistribute it and/or \n
 * modify it under the terms of the GNU Lesser General Public \n
 * License as published by the Free Software Foundation; either \n
 * version 2.1 of the License, or (at your option) any later version. \n
 * \n
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * \n
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 **/

/**
 * @brief Declare constants for generic use and for checking to avoid a direct call from the Web
 **/
define('__XE__',   TRUE);
define('_FILE_PATH_', str_replace('wrequest.php', '', str_replace('\\', '/', __FILE__)));

/**
 * @brief Include the necessary configuration files
 **/
if(file_exists($config_file = '/root/xe/config/config.inc.php'))
    require $config_file;
else
    require  '/home/bitnami/htdocs/config/config.inc.php';

/**
 * @brief Initialize by creating Context object
 * Set all Request Argument/Environment variables
 **/
$oContext = Context::getInstance();
$oContext->init();
/*
if(!is_writable('./req_logs')) exit('INSTALL ERROR - Folder - ' . __LINE__);
if(!$_SERVER['HTTP_REFERER']) exit('Invalid referer');

$log_dir = './req_logs/'.str_replace('/', '_', trim(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH), '/')).'/';
$filename = date('Ymd').'.txt';

makeDir($log_dir);
*/

$request_vars = (array)Context::getRequestVars();

$customer_birth = $request_vars['customer_birth'];
if( strlen($customer_birth) == 6 ) {
	$b_year = substr($customer_birth, 0, 2);
	if( $b_year >= 30 ) 
		$customer_birth = '19'.$customer_birth;
	else
		$customer_birth = '20'.$customer_birth;
}


$request_vars['location'] = $_SERVER['HTTP_REFERER'];
$request_vars['name'] = $request_vars['customer_name'];
$request_vars['birthday'] = $customer_birth;
$request_vars['cellphone'] = $request_vars['mobile1'].$request_vars['mobile2'].$request_vars['mobile3'];
$request_vars['sex'] = $request_vars['customer_sex'] == '1' ? 'M' : 'F';
$request_vars['ipaddress'] = $_SERVER['REMOTE_ADDR'];
$request_vars['module'] = 'aflac';
$request_vars['act'] = 'procAflacInsertConsult';
$phone_hash = md5($request_vars['customer_name']);
/*
if(isDuplicate(_FILE_PATH_.$log_dir.$filename, $phone_hash)) {
	echo sprintf('%s(%s);', $request_vars['rich'], json_encode(array('member_id' => -1, 'rule_seqno' => -1)));
	exit();
}
*/
$output = (string)FileHandler::getRemoteResource('http://idb.kro.kr/', http_build_query($request_vars), 3, 'POST', 'application/json');
$result = jsonp_decode($output);
/*
if($result->member_id)
	prepend($log_dir.$filename, implode(',', array(time(), $_SERVER['REMOTE_ADDR'], $phone_hash, $_SERVER['HTTP_REFERER'])));
*/
echo sprintf('%s(%s);', $request_vars['rich'], $output);

// echo preg_replace('/^(.*)(jQuery.*)$/ims', '$2', $output);

Context::close();

function jsonp_decode($jsonp, $assoc = false) { // PHP 5.3 adds depth as third parameter to json_decode
    if($jsonp[0] !== '[' && $jsonp[0] !== '{') { // we have JSONP
       $jsonp = substr($jsonp, strpos($jsonp, '('));
    }
    return json_decode(trim($jsonp,'();'), $assoc);
}

function makeDir($path) {
	return FileHandler::makeDir(_FILE_PATH_.$path);
}

function prepend($path, $str = '') {
	$str = (string)$str."\n";
	$file = @file_get_contents(_FILE_PATH_.$path);
	$content = $str . $file;
	file_put_contents(_FILE_PATH_.$path, $content);
}

function isDuplicate($filepath, $phone_hash) {
	$fp = fopen($filepath, 'r');
	if(!$fp) return false;

	while (($line = fgets($fp)) !== false) {
        list($timestamp, $ipaddress, $hash) = explode(',', $line);
        $hash = trim($hash);

        if(time() - $timestamp > 300) 
        	return false;

        if($hash == $phone_hash)
        	return true;
    }

    fclose($fp);

    return false;
}

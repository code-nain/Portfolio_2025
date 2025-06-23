<?php

/**
 * @brief Declare constants for generic use and for checking to avoid a direct call from the Web
 **/
define('__XE__',   TRUE);

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

$line = array(date('ymd'), date('His'), $_SERVER['HTTP_HOST'], $_SERVER['REMOTE_ADDR'], Context::get('status'), Context::get('resp'), Context::get('qs'));
foreach($line as &$column) $column = str_replace('"', '""', $column);
unset($column);

$line = sprintf('"%s"', implode('","', $line))."\n";

$params = array(
	'HTTP_HOST' => $_SERVER['HTTP_HOST'],
	'REMOTE_ADDR' => $_SERVER['REMOTE_ADDR'],
	'status' => Context::get('status'),
	'resp' => Context::get('resp'),
	'qs' => Context::get('qs'),
	'referer' => $_SERVER['HTTP_REFERER'],
);
$__WRITE_CLICK_LOG__ = 1;
if($__WRITE_CLICK_LOG__)
	FileHandler::getRemoteResource('http://log.r-o.kr/log.php?'.http_build_query($params));
?>
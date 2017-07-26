<?php
error_reporting(E_ALL ^ E_NOTICE);
require('config.php');
include_once('http2pic.class.php');

function set($param) {
	global $_default;
	if(isset($_GET[$param])) {
		return($_GET[$param]);
	}else
	{
		return($_default[$param]);
	}
}

$url = $_GET['url'];
$type = $_GET['type'];
$timeout = set('timeout');
$viewport = set('viewport');
$js = $_GET['js'];
$resizewidth = $_GET['width'];
$cache = $_GET['cache'];
$onfail = rawurldecode($_GET['onfail']);

$params = array('url'=>$url,
				'type'=>$type,
				'timeout'=>$timeout,
				'viewport'=>$viewport,
				'js'=>$js,
				'resizewidth'=>$resizewidth,
				'cache'=>$cache,
				'onfail'=>$onfail);

$http2pic = new http2pic($_config, $params);
//echo nl2br(print_r($http2pic->debug(),true));

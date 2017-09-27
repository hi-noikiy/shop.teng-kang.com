<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
require 'include.php';
session_start();

if (isset($_GET['logout'])) {
	$c->logout($_SESSION['user']);
	var_dump($_SESSION);
	echo 'logout success' . time();
}
else {
	$oauth_data = $c->require_oauth($_SESSION['user']);
	var_dump($oauth_data);
	$a = $c->get('/userasdfa/asda');
	var_dump($a);
}

?>

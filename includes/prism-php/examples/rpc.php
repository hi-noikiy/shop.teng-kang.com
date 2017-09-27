<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
require 'include.php';
$params = array('username' => 'b', 'password' => 'c');
$a = $c->post('/user/login', $params);
var_dump($a);

?>

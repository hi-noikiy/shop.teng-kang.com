<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
require 'include.php';
$mq = $c->notify();
$i = 0;

while (1) {
	$mq->pub('order.new', 'message hello world: ' . $i++);
	echo 'send ' . $i . " \n";
}

?>

<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
require 'include.php';
$mq = $c->notify();

while (1) {
	$data = $mq->get();
	echo $data;
	echo "\n";
	$data->ack();
}

?>

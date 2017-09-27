<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
define('IN_ECS', true);
require dirname(__FILE__) . '/includes/init.php';
if (empty($_SESSION['user_id']) || ($_CFG['integrate_code'] == 'ecshop')) {
	ecs_header('Location:./');
}

uc_call('uc_pm_location', array($_SESSION['user_id']));

?>

<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
function classLoader($class)
{
	$path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	$file = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $path . '.php';

	if (file_exists($file)) {
		require_once $file;
	}
}

spl_autoload_register('classLoader');

?>

<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
function customSetup($barcode, $get)
{
	if (isset($get['checksum'])) {
		$barcode->setChecksum($get['checksum'] === '1' ? true : false);
	}
}

$classFile = 'BCGcode39.barcode.php';
$className = 'BCGcode39';
$baseClassFile = 'BCGBarcode1D.php';
$codeVersion = '5.0.2';

?>

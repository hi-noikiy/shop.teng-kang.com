<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
class BCGParseException extends Exception
{
	protected $barcode;

	public function __construct($barcode, $message)
	{
		$this->barcode = $barcode;
		parent::__construct($message, 10000);
	}
}

?>

<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
namespace OSS\Model;

class PrefixInfo
{
	private $prefix;

	public function __construct($prefix)
	{
		$this->prefix = $prefix;
	}

	public function getPrefix()
	{
		return $this->prefix;
	}
}


?>

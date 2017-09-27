<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
namespace OSS\Result;

class BodyResult extends Result
{
	protected function parseDataFromResponse()
	{
		return empty($this->rawResponse->body) ? '' : $this->rawResponse->body;
	}
}

?>

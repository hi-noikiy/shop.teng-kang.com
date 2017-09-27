<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
namespace OSS\Result;

class GetRefererResult extends Result
{
	protected function parseDataFromResponse()
	{
		$content = $this->rawResponse->body;
		$config = new \OSS\Model\RefererConfig();
		$config->parseFromXml($content);
		return $config;
	}

	protected function isResponseOk()
	{
		$status = $this->rawResponse->status;
		if (((int) (intval($status) / 100) == 2) || ((int) intval($status) === 404)) {
			return true;
		}

		return false;
	}
}

?>

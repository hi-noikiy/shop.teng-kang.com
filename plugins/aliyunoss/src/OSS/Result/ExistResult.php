<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
namespace OSS\Result;

class ExistResult extends Result
{
	protected function parseDataFromResponse()
	{
		return intval($this->rawResponse->status) === 200 ? true : false;
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

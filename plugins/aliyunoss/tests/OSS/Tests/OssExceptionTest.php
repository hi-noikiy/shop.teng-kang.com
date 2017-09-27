<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
namespace OSS\Tests;

class OssExceptionTest extends \PHPUnit_Framework_TestCase
{
	public function testOSS_exception()
	{
		try {
			throw new \OSS\Core\OssException('ERR');
			$this->assertTrue(false);
		}
		catch (\OSS\Core\OssException $e) {
			$this->assertNotNull($e);
			$this->assertEquals($e->getMessage(), 'ERR');
		}
	}
}

?>

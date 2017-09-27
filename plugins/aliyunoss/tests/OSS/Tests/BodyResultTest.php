<?php
//源码由旺旺:ecshop2012所有 未经允许禁止倒卖 一经发现停止任何服务
namespace OSS\Tests;

class BodyResultTest extends \PHPUnit_Framework_TestCase
{
	public function testParseValid200()
	{
		$response = new \OSS\Http\ResponseCore(array(), 'hi', 200);
		$result = new \OSS\Result\BodyResult($response);
		$this->assertTrue($result->isOK());
		$this->assertEquals($result->getData(), 'hi');
	}

	public function testParseInvalid404()
	{
		$response = new \OSS\Http\ResponseCore(array(), null, 200);
		$result = new \OSS\Result\BodyResult($response);
		$this->assertTrue($result->isOK());
		$this->assertEquals($result->getData(), '');
	}
}

?>

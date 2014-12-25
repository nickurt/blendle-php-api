<?php

namespace BlendleTest\Model;

use PHPUnit_Framework_TestCase as TestCase;

class PopularTest extends TestCase
{
	/**
	 * @expectedException \Blendle\Exception\InvalidArgumentException
	 */
	public function testInvalidPopularAmount()
	{
		$client 		= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
		$request 		=	new \Blendle\Request\PopularRequest();
		$request->setAmount('10');
	}

	/**
	 * @expectedException \Blendle\Exception\InvalidArgumentException
	 */
	public function testInvalidPopularPage()
	{
		$client 		= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
		$request 		=	new \Blendle\Request\PopularRequest();
		$request->setPage('1');
	}

	public function testCustomPopularSettings()
	{
		$client 		= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
		$request 		=	new \Blendle\Request\PopularRequest();
		
		$request->setPage(2);
		$this->assertEquals(2, $request->getPage());

		$request->setAmount(5);
		$this->assertEquals(5, $request->getAmount());
	}
}
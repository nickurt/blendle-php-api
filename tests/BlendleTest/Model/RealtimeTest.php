<?php

namespace BlendleTest\Model;

use PHPUnit_Framework_TestCase as TestCase;

class RealtimeTest extends TestCase
{
	/**
     * @expectedException \Blendle\Exception\InvalidArgumentException
     */
	public function testInvalidRealtimeAmount() {
		$client     	= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
		$request 		=	new \Blendle\Request\RealtimeRequest();
		$request->setAmount('10');
	}

	/**
     * @expectedException \Blendle\Exception\InvalidArgumentException
     */
	public function testInvalidPopularPage() {
		$client     	= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
		$request 		=	new \Blendle\Request\RealtimeRequest();
		$request->setPage('1');
	}

	public function testCustomRealtimeSettings() {
		$client     	= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
		$request 		=	new \Blendle\Request\RealtimeRequest();
		
		$request->setPage(2);
		$this->assertEquals(2, $request->getPage());

		$request->setAmount(5);
		$this->assertEquals(5, $request->getAmount());
	}
}
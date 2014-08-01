<?php

namespace BlendleTest\Model;

use PHPUnit_Framework_TestCase as TestCase;

class MeTest extends TestCase
{
	public function testSetMeRequest() {
		$client        	=   new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
		$authorization 	=   new \Blendle\Model\Authorization();
		$authorization->setToken('dSwD*xFss8df58s7dfsdfd77872');

		$request       	=   new \Blendle\Request\MeRequest();
		$request->setAuthorization($authorization);

		$this->assertContainsOnlyInstancesOf('\Blendle\Model\Authorization', array($request->getAuthorization()));
		$this->assertEquals('dSwD*xFss8df58s7dfsdfd77872', $request->getAuthorization()->getToken());
	}
}
<?php

namespace BlendleTest\Model;

use PHPUnit_Framework_TestCase as TestCase;

class AuthoriationTest extends TestCase
{
	public function testSetAuthoriationRequest()
	{
		$client       =   new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
		$request      =   new \Blendle\Request\AuthorizationRequest();
		$request->setUsername('username');
		$request->setPassword('password');

		$this->assertEquals('username', $request->getUsername());
		$this->assertEquals('password', $request->getPassword());
	}
}
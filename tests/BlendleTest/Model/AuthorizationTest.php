<?php

namespace BlendleTest\Model;

use PHPUnit_Framework_TestCase as TestCase;

class AuthoriationTest extends TestCase
{
	/**
     * @expectedException \Blendle\Exception\InvalidCredentialException
     */
	public function testInvalidAuthoriationRequest() {
		$client       =   new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
		$request      =   new \Blendle\Request\AuthorizationRequest();
		$request->setUsername('username');
		$request->setPassword('password');

		$response     =   $client->send($request);
	}
}
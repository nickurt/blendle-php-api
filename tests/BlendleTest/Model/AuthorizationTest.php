<?php

namespace BlendleTest\Model;

use PHPUnit_Framework_TestCase as TestCase;

class AuthoriationTest extends TestCase
{
	/**
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
	public function testInvalidAuthoriationRequest() {
		$client       =   new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
		$request      =   new \Blendle\Request\AuthorizationRequest();
		$request->setUsername('username');
		$request->setPassword('password');

		$response     =   $client->send($request);
	}
}
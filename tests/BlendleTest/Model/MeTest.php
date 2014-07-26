<?php

namespace BlendleTest\Model;

use PHPUnit_Framework_TestCase as TestCase;

class MeTest extends TestCase
{
	/**
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
	public function testInvalidMeRequest() {
		$client        	=   new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
		$authorization 	=   new \Blendle\Model\Authorization();
		$authorization->setToken('dSwD*xFss8df58s7dfsdfd77872');

		$request       	=   new \Blendle\Request\MeRequest();
		$request->setAuthorization($authorization);

		$response      	=   $client->send($request);
	}
}
<?php

namespace BlendleTest\Model;

use PHPUnit_Framework_TestCase as TestCase;

class UserPostsTest extends TestCase
{
	/**
     * @expectedException \Blendle\Exception\HttpRequestException
     */
	public function testInvalidUserPostsRequest() {
		$client 		= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());

		$request 		=	new \Blendle\Request\UserPostsRequest();
		$request->setUsername('TestCase');
		$response 		=	$client->send($request);
	}
}
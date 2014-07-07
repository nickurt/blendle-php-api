<?php

namespace BlendleTest\Model;

use PHPUnit_Framework_TestCase as TestCase;

class ItemTest extends TestCase
{
	/**
     * @expectedException \Blendle\Exception\HttpRequestException
     */
	public function testInvalidItemRequest() {
		$client 		= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());

		$item			=	new \Blendle\Model\Item();
		$item->setId('/dev/null');

		$request		=	new \Blendle\Request\ItemRequest();
		$request->setItem($item);

		$reponse		=	$client->send($request);
	}
}
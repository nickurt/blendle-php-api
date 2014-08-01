<?php

namespace BlendleTest\Model;

use PHPUnit_Framework_TestCase as TestCase;

class ItemTest extends TestCase
{
	public function testSetItemRequest() {
		$client 		= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());

		$item			=	new \Blendle\Model\Item();
		$item->setId('bnl-tpomagazine-20140731-63315');

		$request		=	new \Blendle\Request\ItemRequest();
		$request->setItem($item);

		$this->assertEquals('bnl-tpomagazine-20140731-63315', $item->getId());
		$this->assertNull($request->getAuthorization());
	}

	public function testSetAuthorizationItemRequest() {
		$client 		= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());

		$item			=	new \Blendle\Model\Item();
		$item->setId('bnl-tpomagazine-20140731-63315');

		$request		=	new \Blendle\Request\ItemRequest();
		$request->setItem($item);
		$request->setAuthorization(new \Blendle\Model\Authorization());

		$this->assertContainsOnlyInstancesOf('\Blendle\Model\Authorization', array($request->getAuthorization()));
	}

	public function testSetAuthorizationWithTokenItemRequest() {
		$client 		= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());

		$item			=	new \Blendle\Model\Item();
		$item->setId('bnl-tpomagazine-20140731-63315');

		$request		=	new \Blendle\Request\ItemRequest();
		$request->setItem($item);

		$authorization 	=	new \Blendle\Model\Authorization();
		$authorization->setToken('dSwD*xFss8df58s7dfsdfd77872');

		$request->setAuthorization($authorization);

		$this->assertContainsOnlyInstancesOf('\Blendle\Model\Authorization', array($request->getAuthorization()));
		$this->assertEquals('dSwD*xFss8df58s7dfsdfd77872', $request->getAuthorization()->getToken());

		$this->assertEquals('bnl-tpomagazine-20140731-63315', $item->getId());
	}
}
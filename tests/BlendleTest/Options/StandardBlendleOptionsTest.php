<?php

namespace BlendleTest\Client;

use PHPUnit_Framework_TestCase as TestCase;
use Blendle\Options\StandardBlendleOptions;

class StandardOptionsTest extends TestCase
{
	public function testStandardBlendleOptions()
	{
		$options = new StandardBlendleOptions();
	}

	/**
	 * @expectedException \Blendle\Exception\MalformedUrlException
	 */
	public function testMalformedUrlExceptionStandardBlendleOptions()
	{
		$client = new StandardBlendleOptions();
	   	$client->setBaseUrl('/dev/null');
	}

	public function testGetStandardBlendleOptionsTokensUrl()
	{
		$client = new StandardBlendleOptions();

	   	$this->assertEquals('https://ws.blendle.nl', $client->getBaseUrl());
	   	$this->assertEquals('https://ws.blendle.nl/tokens', $client->getTokensUrl());
	   	$this->assertEquals('https://ws.blendle.nl/me', $client->getMeUrl());
	   	$this->assertEquals('https://ws.blendle.nl/item/%s', $client->getItemurl());
	   	$this->assertEquals('https://ws.blendle.nl/item/%s/content', $client->getItemContentUrl());
	   	$this->assertEquals('https://ws.blendle.nl/items/popular?amount=%d&page=%d&include=popular_post', $client->getPopularUrl());
	   	$this->assertEquals('https://ws.blendle.nl/posts?amount=%d&page=%d', $client->getRealtimeUrl());
//		$this->assertEquals('https://ws.blendle.nl/search?q=%s&limit=%s&offset=%s', $client->getSearchUrl());
	  	$this->assertEquals('https://ws.blendle.nl/user/%s/posts', $client->getUserPostsUrl());
	}

	public function testSetStandardBlendleOptionsTokensUrl()
	{
		$client = new StandardBlendleOptions();

		$client->setBaseUrl('https://internal.blendle.nl');
	   	$client->setTokensUrl('https://internal.blendle.nl/tokens');
	   	$client->setMeUrl('https://internal.blendle.nl/me');
	   	$client->setItemUrl('https://internal.blendle.nl/item/%s');
	   	$client->setItemContentUrl('https://internal.blendle.nl/item/%s/content');
	   	$client->setPopularUrl('https://internal.blendle.nl/items/popular?amount=%d&page=%d&include=popular_post');
	   	$client->setRealtimeUrl('https://internal.blendle.nl/posts?amount=%d&page=%d');
//		$client->setSearchUrl('https://internal.blendle.nl/search?q=%s&limit=%s&offset=%s');
	  	$client->setUserPostsUrl('https://internal.blendle.nl/user/%s/posts');

	   	$this->assertEquals('https://internal.blendle.nl', $client->getBaseUrl());
	   	$this->assertEquals('https://internal.blendle.nl/tokens', $client->getTokensUrl());
	   	$this->assertEquals('https://internal.blendle.nl/me', $client->getMeUrl());
	   	$this->assertEquals('https://internal.blendle.nl/item/%s', $client->getItemurl());
	   	$this->assertEquals('https://internal.blendle.nl/item/%s/content', $client->getItemContentUrl());
	   	$this->assertEquals('https://internal.blendle.nl/items/popular?amount=%d&page=%d&include=popular_post', $client->getPopularUrl());
	   	$this->assertEquals('https://internal.blendle.nl/posts?amount=%d&page=%d', $client->getRealtimeUrl());
//		$this->assertEquals('https://internal.blendle.nl/search?q=%s&limit=%s&offset=%s', $client->getSearchUrl());
	  	$this->assertEquals('https://internal.blendle.nl/user/%s/posts', $client->getUserPostsUrl());
	}
}
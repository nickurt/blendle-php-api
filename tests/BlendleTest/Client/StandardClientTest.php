<?php

namespace BlendleTest\Client;

use PHPUnit_Framework_TestCase as TestCase;
use Blendle\Client\StandardClient;
use Blendle\Options\StandardBlendleOptions;

class StandardClientTest extends TestCase
{
	public function testStandardClient()
	{
		$client = new StandardClient(new StandardBlendleOptions());
	}
}
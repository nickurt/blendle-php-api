<?php

namespace BlendleTest\Client;

use PHPUnit_Framework_TestCase as TestCase;
use Blendle\Options\StandardBlendleOptions;

class StandardOptionsTest extends TestCase
{
    public function testStandardBlendleOptions() {
	    $options = new StandardBlendleOptions();
	}

	/**
     * @expectedException \Blendle\Exception\MalformedUrlException
     */
	public function testMalformedUrlExceptionStandardBlendleOptions() {
		$client = new StandardBlendleOptions();
	   	$client->setBaseUrl('/dev/null');
	}

	public function testGetStandardBlendleOptionsTokensUrl() {
		$client = new StandardBlendleOptions();
	   	$client->getTokensUrl();
	}
}
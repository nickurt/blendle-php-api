<?php

namespace BlendleTest\Exception;

use PHPUnit_Framework_TestCase as TestCase;

class ExceptionTest extends TestCase
{
	/**
     * @expectedException \Blendle\Exception\MalformedUrlException
     */
	public function testMalformedUrlException() {
		throw new \Blendle\Exception\MalformedUrlException();
	}

	/**
     * @expectedException \Blendle\Exception\HttpRequestException
     */
	public function testHttpRequestException() {
		throw new \Blendle\Exception\HttpRequestException();
	}

	/**
     * @expectedException \Blendle\Exception\InvalidArgumentException
     */
	public function testInvalidArgumentException() {
		throw new \Blendle\Exception\InvalidArgumentException();
	}

	/**
     * @expectedException \Blendle\Exception\InvalidCredentialException
     */
	public function testInvalidCredentialException() {
		throw new \Blendle\Exception\InvalidCredentialException();
	}

	/**
     * @expectedException \Blendle\Exception\NotImplementedException
     */
	public function testNotImplementedException() {
		throw new \Blendle\Exception\NotImplementedException();
	}

	/**
     * @expectedException \Blendle\Exception\RuntimeException
     */
	public function testRuntimeException() {
		throw new \Blendle\Exception\RuntimeException();
	}
}
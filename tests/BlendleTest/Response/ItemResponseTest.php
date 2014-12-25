<?php

namespace BlendleTest\Model;

use PHPUnit_Framework_TestCase as TestCase;

class ItemResponseTest extends TestCase
{
    public function testItemResponse()
    {
        $json 		= 	file_get_contents(__DIR__.'\bnl-nn-20140801-1405555.json');
        $response 	= 	new \GuzzleHttp\Message\Response(200, [], \GuzzleHttp\Stream\Stream::factory($json));
        $json 		= 	$response->json();

        $this->assertEquals($json['id'], 'bnl-nn-20140801-1405555');
        $this->assertEquals($json['posts'], 7);
        $this->assertEquals($json['acquired'], false);
        $this->assertEquals($json['refundable'], false);
        $this->assertEquals($json['price'], '0.19');
    }

	public function testItemModelResponse()
    {
        $json 		= 	file_get_contents(__DIR__.'\bnl-nn-20140801-1405555.json');
        $response 	= 	new \GuzzleHttp\Message\Response(200, [], \GuzzleHttp\Stream\Stream::factory($json));
        $json 		= 	$response->json();

        $item 		= 	new \Blendle\Model\Item();

        $item->setId($json['_embedded']['manifest']['id']);

        $this->assertEquals($item->getId(), 'bnl-nn-20140801-1405555');
    }
}
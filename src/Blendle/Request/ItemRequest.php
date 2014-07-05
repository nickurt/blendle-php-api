<?php
namespace Blendle\Request;

class ItemRequest implements RequestInterface
{
	protected $item;
	
	public function setItem(\Blendle\Model\Item $model) {
		$this->item = $model;
	}
	
	public function getItem() {
		return $this->item;
	}
}

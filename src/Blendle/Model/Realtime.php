<?php

namespace Blendle\Model;

class Realtime {
	protected $items;
	
	public function setItem(\Blendle\Model\Item $item) 
	{
		$this->items[] = $item;
	}
	
	public function getItem() 
	{
		return $this->items;
	}
}
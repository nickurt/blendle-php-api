<?php

namespace Blendle\Model;

class Popular {
	protected $items;
	
	public function setItem(\Blendle\Model\Item $item) 
	{
		$this->items[] = $item;
		return $this;
	}
	
	public function getItem() 
	{
		return $this->items;
	}
}
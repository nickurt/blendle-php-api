<?php

namespace Blendle\Model;

class Popular {
	protected $items;
	
	public function setItem($item) {
		$this->items[] = $item;
	}
	public function getItem() {
		return $this->items;
	}
}
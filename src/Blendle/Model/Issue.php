<?php

namespace Blendle\Model;

class Issue {
	protected $date;
	protected $format_version;
	protected $id;
	protected $initial_publication_time;

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
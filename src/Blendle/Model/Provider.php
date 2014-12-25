<?php

namespace Blendle\Model;

class Provider {
	protected $name;
	
	public function setName($name) 
	{
		$this->name = $name;
		return $this;
	}
	
	public function getName() 
	{
		return $this->name;
	}
}
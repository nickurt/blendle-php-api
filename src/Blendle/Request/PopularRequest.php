<?php
namespace Blendle\Request;

class PopularRequest implements RequestInterface
{
	protected $amount = 10;
	
	public function setAmount($amount) {
		$this->amount = $amount;
	}
	
	public function getAmount() {
		return $this->amount;
	}
}

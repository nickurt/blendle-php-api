<?php
namespace Blendle\Request;

class PopularRequest implements RequestInterface
{
	protected $amount 	= 	10;
	protected $page 	=	1;

	public function setAmount($amount) 
	{
		if( !is_int($amount) || $amount < 1 || $amount > 20 ) {
			throw new \Blendle\Exception\InvalidArgumentException();
		}
		
		$this->amount = $amount;
	}

	public function setPage($page) 
	{
		if ( !is_int($page) || $page < 1) {
			throw new \Blendle\Exception\InvalidArgumentException();
		}

		$this->page = $page;
	}
	
	public function getAmount() 
	{
		return $this->amount;
	}

	public function getPage() 
	{
		return $this->page;
	}
}

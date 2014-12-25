<?php
namespace Blendle\Request;

class RealtimeRequest implements RequestInterface
{
	protected $page = 1;
	protected $amount = 10;
	
	/**
	 * getPage
	 * 
	 * @return Integer $page
	 */
	public function getPage() 
	{
		return $this->page;
	}

	/**
	 * getAmount
	 * 
	 * @return Ingeger $amount
	 */
	public function getAmount() 
	{
		return $this->amount;
	}

	/**
	 * setPage
	 * 
	 * @param Integer $page
	 */
	public function setPage($page) 
	{
		if( !is_int($page) || $page < 1 ) {
			throw new \Blendle\Exception\InvalidArgumentException();
		}

		$this->page = $page;
	}

	/**
	 * setAmount
	 * 
	 * @param Integer $amount
	 */
	public function setAmount($amount) 
	{
		if( !is_int($amount) || $amount < 1 || $amount > 20 ) {
			throw new \Blendle\Exception\InvalidArgumentException();
		}
		
		$this->amount = $amount;
	}
}

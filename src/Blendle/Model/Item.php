<?php

namespace Blendle\Model;

class Item {
	protected $acquired;
	protected $id;
	protected $price;
	protected $refundable;
	protected $date;
	protected $format_version;
	protected $url;
	protected $title;
	protected $body;
	protected $words;
	
	public function setId($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	public function setFormatVersion($format_version) 
	{
		$this->format_version = $format_version;
		return $this;
	}
	
	public function setDate($date) 
	{
		$this->date = $date;
		return $this;
	}
	
	public function setUrl($url) 
	{
		$this->url = $url;
		return $this;
	}
	
	public function setTitle($title) 
	{
		$this->title = strip_tags ( $title );
		return $this;
	}
	
	public function setAcquired($acquired) 
	{
		$this->acquired = $acquired;
		return $this;
	}
	
	public function setRefundable($refundable) 
	{
		$this->refundable = $refundable;
		return $this;
	}
	
	public function setPrice($price) 
	{
		$this->price = $price;
		return $this;
	}

	public function setBody($body) 
	{
		$this->body[] = strip_tags( $body );
		return $this;
	}

	public function setWords($words) 
	{
		$this->words = $words;
		return $this;
	}
	
	public function getId() 
	{
		return $this->id;
	}
	
	public function getTitle() 
	{
		return $this->title;
	}

	public function getBody() 
	{
		return $this->body;
	}

	public function getAcquired() 
	{
		return $this->acquired;
	}

	public function getWords() 
	{
		return $this->words;
	}

	public function getPrice() 
	{
		return $this->price;
	}

	public function getWordsPrice() 
	{
		return number_format( ( $this->price / $this->words ), 6);
	}

	public function getUrl()
	{
		return $this->url;
	}
}
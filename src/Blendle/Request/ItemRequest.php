<?php
namespace Blendle\Request;

class ItemRequest implements RequestInterface
{
	protected $item;
	protected $authorization;
	
	public function setItem(\Blendle\Model\Item $model) {
		$this->item = $model;
	}
	
	public function getItem() {
		return $this->item;
	}

	/**
	 * setAuthorization
	 * @param \Blendle\Model\Authorization $model
	 */
	public function setAuthorization(\Blendle\Model\Authorization $model) {
		$this->authorization = $model;
	}
	
	/**
	 * getAutorization
	 * @return \Blendle\Model\Authorization
	 */
	public function getAuthorization() {
		return $this->authorization;
	}

	/**
	 * hasAuthorization
	 * Check if the model has a valid Authorization Model
	 *
	 * @return Boolean
	 */
	public function hasAuthorization() {
		return (bool) ($this->authorization instanceof \Blendle\Model\Authorization);
	}
}

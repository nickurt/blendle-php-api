<?php
namespace Blendle\Request;

class MeRequest implements RequestInterface
{
	protected $authorization;
	
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
}

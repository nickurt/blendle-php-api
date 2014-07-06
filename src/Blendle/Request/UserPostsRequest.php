<?php
namespace Blendle\Request;

class UserPostsRequest implements RequestInterface
{
	protected $username;
	
	/**
	 * setUsername
	 * @param String $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}
	
	/**
	 * getUsername
	 * @return String username
	 */
	public function getUsername() {
		return $this->username;
	}
}

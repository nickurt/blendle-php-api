<?php
namespace Blendle\Request;

class AuthorizationRequest implements RequestInterface
{
	protected $username;
	protected $password;
	
	/**
	 * getUsername
	 * @return String username
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * getPassword
	 * @return String password
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * setUsername
	 * @param String $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * setPassword
	 * @param String $password
	 */
	public function setPassword($password) {
		$this->password = $password;
	}
}
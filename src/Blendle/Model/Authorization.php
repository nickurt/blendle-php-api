<?php

namespace Blendle\Model;

class Authorization {
	protected $token;
	/**
	 * @return the $token
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * @param field_type $token
	 */
	public function setToken($token) {
		$this->token = $token;
	}
}
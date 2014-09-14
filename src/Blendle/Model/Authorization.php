<?php

namespace Blendle\Model;

class Authorization {
	protected $token;
	
	/**
	 * getToken
	 * 
	 * Get the token from the Model if isset, otherwise getTokenFromCookie
	 * 
	 * @return String $token
	 */
	public function getToken() 
	{
		return isset($this->token) ? $this->token : $this->getTokenCookie();
	}

	/**
	 * setToken
	 * 
	 * @param String $token
	 */
	public function setToken($token) 
	{
		$this->token = $token;
	}

	/**
	 * setTokenCookie
	 * 
	 * @param String $token
	 */
	public function setTokenCookie($token) 
	{
		// Set the cookie for ((60 * 60) * 24) * 30 (30 days) lifetime */
		setcookie("token", $token, ( time() + 2592000 ) );
	}

	/**
	 * removeTokenCookie
	 * 
	 * Remove the Token (value) in the Cookie
	 * 
	 * @return boolean
	 */	
	public function removeTokenCookie() 
	{
		if( isset($_COOKIE["token"]) ) 
		{
			// Remove the token with null and set the expire date to the past
			setcookie("token", '', time() - 3600);
			
			return true;
		}
		
		return false;
	}

	/**
	 * getTokenCookie
	 * 
	 * Get the Blendle Token from the token Cookie
	 * 
	 * @throws \Blendle\Exception\RuntimeException
	 */
	public function getTokenCookie() 
	{
		if( ! isset($_COOKIE["token"]) ) 
		{
			throw new \Blendle\Exception\RuntimeException('Blendle Token Cookie not set');
		}
		
		return $_COOKIE["token"];
	}
}
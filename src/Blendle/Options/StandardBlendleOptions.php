<?php

namespace Blendle\Options;

class StandardBlendleOptions
{
    protected $baseUrl 		= 	'https://ws.blendle.nl';
    protected $tokensUrl	=	'https://ws.blendle.nl/tokens';
    protected $meUrl		=	'https://ws.blendle.nl/me';
    protected $popularUrl	=	'https://ws.blendle.nl/popular';
	
	/**
	 * getBaseUrl
	 * 
	 * @return string baseUrl
	 */
	public function getBaseUrl() {
		return $this->baseUrl;
	}

	/**
	 * getTokensUrl
	 * 
	 * @return string $tokenUrl
	 */
	public function getTokensUrl() {
		return $this->tokensUrl;
	}

	/**
	 * getMeUrl
	 * 
	 * @return string $meUrl
	 */
	public function getMeUrl() {
		return $this->meUrl;
	}
	
	/**
	 * getPopularUrl
	 * 
	 * @return string $popularUrl
	 */
	public function getPopularUrl() {
		return $this->popularUrl;
	}

	/**
	 * setBaseUrl
	 * 
	 * @param String $baseUrl
	 * @throws \Blendle\Exception\MalformedURLException
	 */
	public function setBaseUrl($baseUrl) {
		if( filter_var($baseUrl, FILTER_VALIDATE_URL) === false ) {
			throw new \Blendle\Exception\MalformedURLException();
		}
		
		$this->baseUrl = $baseUrl;
	}

	/**
	 * setTokensUrl
	 * 
	 * @param String $tokensUrl
	 * @throws \Blendle\Exception\MalformedURLException
	 */
	public function setTokensUrl($tokensUrl) {
		if( filter_var($tokensUrl, FILTER_VALIDATE_URL) === false ) {
			throw new \Blendle\Exception\MalformedURLException();
		}
		
		$this->tokensUrl = $tokensUrl;
	}

	/**
	 * setMeUrl
	 * 
	 * @param String $meUrl
	 * @throws \Blendle\Exception\MalformedURLException
	 */
	public function setMeUrl($meUrl) {
		if( filter_var($meUrl, FILTER_VALIDATE_URL) === false ) {
			throw new \Blendle\Exception\MalformedURLException();
		}
		
		$this->meUrl = $meUrl;
	}
	
	/**
	 * setPopularUrl
	 * 
	 * @param String $popularUrl
	 * @throws \Blendle\Exception\MalformedURLException
	 */
	public function setPopularUrl($popularUrl) {
		if( filter_var($popularUrl, FILTER_VALIDATE_URL) === false ) {
			throw new \Blendle\Exception\MalformedURLException();
		}
	
		$this->popularUrl = $popularUrl;
	}
}
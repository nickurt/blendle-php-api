<?php

namespace Blendle\Options;

class StandardBlendleOptions
{
    protected $baseUrl 			= 	'https://ws.blendle.nl';
    protected $tokensUrl		=	'https://ws.blendle.nl/tokens';
    protected $meUrl			=	'https://ws.blendle.nl/me';

    protected $itemUrl			=	'https://ws.blendle.nl/item/%s';
    protected $itemContentUrl	=	'https://ws.blendle.nl/item/%s/content';
    protected $popularUrl		=	'https://ws.blendle.nl/items/popular?amount=%d&page=%d&include=popular_post';
	protected $realtimeUrl		=	'https://ws.blendle.nl/posts?amount=%d&page=%d';
	protected $searchUrl		=	'https://ws.blendle.nl/search?q=%s&limit=%s&offset=%s';
	protected $userPostsUrl		=	'https://ws.blendle.nl/user/%s/posts';

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
	 * getItemUrl
	 * 
	 * @return string $itemUrl
	 */
	public function getItemUrl() {
		return $this->itemUrl;
	}

	/**
	 * getItemContentUrl
	 *
	 * @return string $itemContentUrl
	 */
	public function getItemContentUrl() {
		return $this->itemContentUrl;
	}

	/**
	 * getRealtimeUrl
	 *
	 * @return string $realtimeUrl
	 */
	public function getRealtimeUrl() {
		return $this->realtimeUrl;
	}

	/**
	 * getUserPostsUrl
	 *
	 * @return string $userPostsUrl
	 */
	public function getUserPostsUrl() {
		return $this->userPostsUrl;
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
	
	/**
	 * setItemUrl
	 * 
	 * @param String $itemUrl
	 * @throws \Blendle\Exception\MalformedURLException
	 */
	public function setItemUrl($itemUrl) {
		if( filter_var($itemUrl, FILTER_VALIDATE_URL) === false ) {
			throw new \Blendle\Exception\MalformedURLException();
		}
		
		$this->itemUrl = $itemUrl;
	}

	/**
	 * setItemContentUrl
	 * 
	 * @param String $itemContentUrl
	 * @throws \Blendle\Exception\MalformedURLException
	 */
	public function setItemContentUrl($itemContentUrl) {
		if( filter_var($itemContentUrl, FILTER_VALIDATE_URL) === false ) {
			throw new \Blendle\Exception\MalformedURLException();
		}
		
		$this->itemContentUrl = $itemContentUrl;
	}

	/**
	 * setRealtimeUrl
	 * 
	 * @param String $realtimeUrl
	 * @throws \Blendle\Exception\MalformedURLException
	 */
	public function setRealtimeUrl($realtimeUrl) {
		if( filter_var($realtimeUrl, FILTER_VALIDATE_URL) === false ) {
			throw new \Blendle\Exception\MalformedURLException();
		}
		
		$this->realtimeUrl = $realtimeUrl;
	}

	/**
	 * setUrlPostsUrl
	 * 
	 * @param String $userPostsUrl
	 * @throws \Blendle\Exception\MalformedURLException
	 */
	public function setUserPostsUrl($userPostsUrl) {
		if( filter_var($userPostsUrl, FILTER_VALIDATE_URL) === false ) {
			throw new \Blendle\Exception\MalformedURLException();
		}
		
		$this->userPostsUrl = $userPostsUrl;
	}
}
<?php

namespace Blendle\Client;

use Blendle\Model\Authorization;
class StandardClient
{
    protected $options;
    protected $data;
    protected $authorization;
    protected $authorization_required	= 	false;
    protected $requestUrl;
    
    /**
     * __construct
     * 
     * Set the StandardBlendleOptions for the StandardClient
     * 
     * @param \Blendle\Options\StandardBlendleOptions $options
     */
    public function __construct(\Blendle\Options\StandardBlendleOptions $options)
    {
        $this->options = $options;
    }

    /**
     * getOptions
     * 
     * Get the StandardBlendleOptions
     * 
     * @return \Blendle\Options\StandardBlendleOptions
     */
    public function getOptions()
    {
        return $this->options;
    }

	/**
	 * Send
	 * 
	 * @param \Blendle\Request\RequestInterface $request
	 * @throws \Blendle\Exception\InvalidArgumentException
	 * @return \Blendle\Model\Authorization|\Blendle\Model\User
	 */
    public function send(\Blendle\Request\RequestInterface $request)
    {
    	switch (get_class($request)) {
    		case "Blendle\Request\AuthorizationRequest":
    			return $this->sendAuthorizationRequest($request);
    			break;
    		case "Blendle\Request\UserRequest":
    			return $this->sendUserRequest($request);
    			break;
    		default:
    			throw new \Blendle\Exception\InvalidArgumentException('InvalidRequestArgument');
    			break;
    	}
    }    

    /** 
     * getRequest
     * 
     * @param unknown $request
     * @throws \Blendle\Exception\HttpRequestException
     * @return mixed
     */
    protected function getRequest($request) {
    	$token 		= 	$this->isAuthorizationTokenRequired() ? $this->getAuthorizationToken() : false;

    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $this->getRequestUrl());
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_HEADER, 0);
    	curl_setopt($ch, CURLOPT_POST, 0);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, array($token));
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    	$output = curl_exec($ch);
    	 
    	// Get the HTTP Status of the CurlRequest
    	$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    	
    	// Request not successfully
    	if($http_status === 404 || $http_status === 500 || $http_status === 403) {
    		throw new \Blendle\Exception\HttpRequestException(
    			'Verzoek niet succesvol uitgevoerd'
    		);
    	}
    	
    	$decoded = json_decode ( $output );
    	
    	// Ugh, we have an problem!
    	if( isset( $decoded->message ) ) {
    		throw new \Blendle\Exception\InvalidCredentialException($decoded->message);
    	}
    	
    	curl_close($ch);
    	
    	return $decoded;
    }
    
    /**
     * postRequest
     * 
     * @param unknown $request
     * @throws \Blendle\Exception\HttpRequestException
     * @return mixed
     */
    protected function postRequest($request) {
    	$token 		= 	$this->isAuthorizationTokenRequired() ? $this->getAuthorizationToken() : false;
    	
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $this->getRequestUrl());
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    	curl_setopt($ch, CURLOPT_HEADER, 0);
    	curl_setopt($ch, CURLOPT_POST, 1);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $this->getData());
    	curl_setopt($ch, CURLOPT_HTTPHEADER, array($token));
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    	$output = curl_exec($ch);
    	 
    	// Get the HTTP Status of the CurlRequest
    	$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    	
    	// Request not successfully
    	if($http_status === 404 || $http_status === 500 || $http_status === 403) {
    		throw new \Blendle\Exception\HttpRequestException(
    			'Verzoek niet succesvol uitgevoerd'
    		);
    	}
    	
    	$decoded = json_decode ( $output );
    	
    	// Ugh, we have an problem!
    	if( isset( $decoded->message ) ) {
    		throw new \Blendle\Exception\InvalidCredentialException($decoded->message);
    	}
    	
    	curl_close($ch);
    	
    	return $decoded;
    }
    
    public function setData(array $data) {
    	$this->data = json_encode( $data );
    }

    public function getData() {
    	return $this->data;
    }

    public function setRequestUrl($url) {
    	$this->requestUrl = $url;
    }

    public function getRequestUrl() {
    	return $this->requestUrl;
    }

    /**
     * setAuthorizationToken
     * 
     * @param String $token
     */
    public function setAuthorizationToken($token) {
    	$this->authorization = $token;
    }
    
    /**
     * getAuthorizationToken
     * 
     * @return string AuthorizationToken
     */
    public function getAuthorizationToken() {
    	return sprintf('X-Authorization:Token token="%s"', $this->authorization);   
    }
    
    /**
     * needAuthorizationToken
     * 
     * Is there an Token needed for the request?
     * 
     * @param bool $is_required
     */
    public function needAuthorizationToken( $is_required ) {
    	$this->authorization_required = $is_required;
    }
    
    /**
     * isAuthorizationTokenRequired
     * 
     * @return boolean
     */
    public function isAuthorizationTokenRequired() {
    	return $this->authorization_required;
    }
    
    /**
     * sendAuthorizationRequest
     * 
     * @param \Blendle\Request\AuthorizationRequest $request
     * @throws \Blendle\Exception\InvalidCredentialException
     * @return \Blendle\Model\Authorization
     */
    protected function sendAuthorizationRequest(\Blendle\Request\AuthorizationRequest $request) {
    	// Set the data
		$this->setData( array( "login" => $request->getUsername(), "password" => $request->getPassword() ) );
		$this->setRequestUrl( $this->getOptions()->getTokensUrl() );
		$this->needAuthorizationToken(false);
		
		// Request
		$response = $this->postRequest( $request );

		// Authorization
		$authorization = new \Blendle\Model\Authorization();
		$authorization->setToken($response->token);

		return $authorization;
    }
    
    /**
     * sendUserRequest
     *
     * @param \Blendle\Request\UserRequest $request
     * @return \Blendle\Model\User
     */
    protected function sendUserRequest(\Blendle\Request\UserRequest $request) {
    	// Set the data
    	$this->setRequestUrl( $this->getOptions()->getMeUrl() );
    	$this->needAuthorizationToken(true);
    	$this->setAuthorizationToken($request->getAuthorization()->getToken());
    	
    	// Request
    	$response = $this->getRequest( $request );
    	
    	// User
    	$user = new \Blendle\Model\User();
    	$user->setId($response->id);
    	$user->setUsername($response->username);
    	$user->setPosts($response->posts);
    	$user->setReads($response->reads);
    	$user->setFollowers($response->followers);
    	$user->setFollows($response->follows);
    	$user->setEmail($response->email);
    	$user->setEmailConfirmed($response->email_confirmed);
    	$user->setFacebookId($response->facebook_id);
    	$user->setFollowersOptOut($response->followers_opt_out);
    	$user->setMixpanelOptOut($response->mixpanel_opt_out);
    	$user->setNrcEmailShare($response->nrc_email_share);
    	$user->setText($response->nrc_email_share);
    	$user->setUnconfirmedUid($response->unconfirmed_uid);
    	$user->setVerified($response->verified);
    
    	return $user;
    }
}
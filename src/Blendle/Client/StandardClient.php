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
    		case "Blendle\Request\MeRequest":
    			return $this->sendMeRequest($request);
    			break;
    		case "Blendle\Request\PopularRequest":
    			return $this->sendPopularRequest($request);
    			break;
    		case "Blendle\Request\ItemRequest":
    			return $this->sendItemRequest($request);
    			break;
    		case "Blendle\Request\RealtimeRequest":
    			return $this->sendRealtimeRequest($request);
    			break;
            case "Blendle\Request\UserPostsRequest":
                return $this->sendUserPostsRequest($request);
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
     * @param \Blendle\Request\MeRequest $request
     * @return \Blendle\Model\Me
     */
    protected function sendMeRequest(\Blendle\Request\MeRequest $request) {
    	// Set the data
    	$this->setRequestUrl( $this->getOptions()->getMeUrl() );
    	$this->needAuthorizationToken(true);
    	$this->setAuthorizationToken($request->getAuthorization()->getToken());

    	// Request
    	$response = $this->getRequest( $request );
    	
    	// User
    	$user = new \Blendle\Model\Me();
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
    
    protected function sendPopularRequest(\Blendle\Request\PopularRequest $request) { 
    	$this->setRequestUrl( sprintf($this->getOptions()->getPopularUrl(), $request->getAmount(), $request->getPage()) );
    	$this->needAuthorizationToken(false);
    	
    	$response = $this->getRequest ($request);
    	
    	$obj = new \Blendle\Model\Popular();
    	
    	foreach($response->_embedded->items as $items) {
    		$item 		= 	new \Blendle\Model\Item();
    		
    		$item->setId($items->_embedded->manifest->id);
    		$item->setFormatVersion($items->_embedded->manifest->format_version);
    		$item->setDate($items->_embedded->manifest->date);
    		$item->setUrl($items->_links->self->href);
    		
    		$item->setPrice($items->price);
    		
    		// Title
    		foreach($items->_embedded->manifest->body as $body) {
    			switch($body->type) {
    				case "hl1":
    					$item->setTitle($body->content);
    					break;
    				default:
    					break;
    			}
    		}
    		
    		$obj->setItem($item);
    	}
    	
    	return $obj;
    }
    
    protected function sendItemRequest(\Blendle\Request\ItemRequest $request) {
    	$this->setRequestUrl( sprintf($this->getOptions()->getItemUrl(), $request->getItem()->getId()) );
    	$this->needAuthorizationToken(false);
    	 
    	$response 	= 	$this->getRequest ($request);

    	// Blendle Item 
    	$item 		= 	new \Blendle\Model\Item();

    	$item->setId($response->_embedded->manifest->id);
    	$item->setFormatVersion($response->_embedded->manifest->format_version);
    	$item->setDate($response->_embedded->manifest->date);
    	$item->setUrl($response->_links->self->href);

    	$item->setAcquired($response->acquired);
    	$item->setRefundable($response->refundable);
    	$item->setPrice($response->price);
    	
        // Title
    	foreach($response->_embedded->manifest->body as $body) {
    		switch($body->type) {
    			case "hl1":
    				$item->setTitle($body->content);
    				break;
    			default:
    				break;
    		}
    	}
        	 
    	return $item;
    }
    
    protected function sendRealtimeRequest(\Blendle\Request\RealtimeRequest $request) {
    	$this->setRequestUrl( sprintf( $this->getOptions()->getRealtimeUrl(), $request->getAmount(), $request->getPage() ) );
    	$this->needAuthorizationToken(false);

    	$response 	= 	$this->getRequest ($request);
    	
    	$obj 		= 	new \Blendle\Model\Realtime();

    	foreach($response->_embedded->posts as $items) {
    		$item 		= 	new \Blendle\Model\Item();

    		$item->setId($items->_embedded->manifest->id);
    		$item->setFormatVersion($items->_embedded->manifest->format_version);
    		$item->setDate($items->_embedded->manifest->date);
    		$item->setUrl($items->_links->self->href);
    		
    //		$item->setPrice($items->price);
    		
    		// Title
    		foreach($items->_embedded->manifest->body as $body) {
    			switch($body->type) {
    				case "hl1":
    					$item->setTitle($body->content);
    					break;
    				default:
    					break;
    			}
    		}
    		
    		$obj->setItem($item);
    	}
    	
    	return $obj;
    
    	return $item;
    }

    protected function sendUserPostsRequest(\Blendle\Request\UserPostsRequest $request) {
        $this->setRequestUrl( sprintf( $this->getOptions()->getUserPostsUrl(), $request->getUsername() ) );
        $this->needAuthorizationToken(false);

        $response   =   $this->getRequest ($request);

        $obj        =   new \Blendle\Model\UserPosts();

        foreach($response->_embedded->posts as $items) {
            $item       =   new \Blendle\Model\Item();

            $item->setId($items->_embedded->manifest->id);
            $item->setFormatVersion($items->_embedded->manifest->format_version);
            $item->setDate($items->_embedded->manifest->date);
            $item->setUrl($items->_links->self->href);
            
    //      $item->setPrice($items->price);
            
            // Title
            foreach($items->_embedded->manifest->body as $body) {
                switch($body->type) {
                    case "hl1":
                        $item->setTitle($body->content);
                        break;
                    default:
                        break;
                }
            }
            
            $obj->setItem($item);
        }
        
        return $obj;
    
        return $item;
    }
}
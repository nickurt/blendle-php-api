<?php

namespace Blendle\Model;

class Me {
	protected $id;
	protected $username;
	protected $email;
	protected $email_confirmed;
	protected $facebook_id;
	protected $followers;
	protected $followers_opt_out;
	protected $follows;
	protected $mixpanel_opt_out;
	protected $nrc_email_share;
	protected $posts;
	protected $reads;
	protected $text;
	protected $unconfirmed_uid;
	protected $verified;

	/**
	 * @return the $id
	 */
	public function getId() 
	{
		return $this->id;
	}

	/**
	 * @return the $username
	 */
	public function getUsername() 
	{
		return $this->username;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() 
	{
		return $this->email;
	}

	/**
	 * @return the $emailconfirmed
	 */
	public function getEmailConfirmed() 
	{
		return $this->email_confirmed;
	}

	/**
	 * @return the $facebook_id
	 */
	public function getFacebookId() 
	{
		return $this->facebook_id;
	}

	/**
	 * @return the $followers
	 */
	public function getFollowers() 
	{
		return $this->followers;
	}

	/**
	 * @return the $followers_opt_out
	 */
	public function getFollowersOptOut() 
	{
		return $this->followers_opt_out;
	}

	/**
	 * @return the $follows
	 */
	public function getFollows() 
	{
		return $this->follows;
	}

	/**
	 * @return the $mixpanel_opt_out
	 */
	public function getMixpanelOptOut() 
	{
		return $this->mixpanel_opt_out;
	}

	/**
	 * @return the $nrc_email_share
	 */
	public function getNrcEmailShare() 
	{
		return $this->nrc_email_share;
	}

	/**
	 * @return the $posts
	 */
	public function getPosts() 
	{
		return $this->posts;
	}

	/**
	 * @return the $reads
	 */
	public function getReads() 
	{
		return $this->reads;
	}

	/**
	 * @return the $text
	 */
	public function getText() 
	{
		return $this->text;
	}

	/**
	 * @return the $unconfirmed_uid
	 */
	public function getUnconfirmedUid() 
	{
		return $this->unconfirmed_uid;
	}

	/**
	 * @return the $verified
	 */
	public function getVerified() 
	{
		return $this->verified;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) 
	{
		$this->id = $id;
	}

	/**
	 * @param field_type $username
	 */
	public function setUsername($username) 
	{
		$this->username = $username;
	}

	/**
	 * @param field_type $email
	 */
	public function setEmail($email) 
	{
		$this->email = $email;
	}

	/**
	 * @param field_type $email_confirmed
	 */
	public function setEmailConfirmed($email_confirmed) 
	{
		$this->email_confirmed = $email_confirmed;
	}

	/**
	 * @param field_type $facebook_id
	 */
	public function setFacebookId($facebook_id) 
	{
		$this->facebook_id = $facebook_id;
	}

	/**
	 * @param field_type $followers
	 */
	public function setFollowers($followers) 
	{
		$this->followers = $followers;
	}

	/**
	 * @param field_type $followers_opt_out
	 */
	public function setFollowersOptOut($followers_opt_out) 
	{
		$this->followers_opt_out = $followers_opt_out;
	}

	/**
	 * @param field_type $follows
	 */
	public function setFollows($follows) 
	{
		$this->follows = $follows;
	}

	/**
	 * @param field_type $mixpanel_opt_out
	 */
	public function setMixpanelOptOut($mixpanel_opt_out) 
	{
		$this->mixpanel_opt_out = $mixpanel_opt_out;
	}

	/**
	 * @param field_type $nrc_email_share
	 */
	public function setNrcEmailShare($nrc_email_share) 
	{
		$this->nrc_email_share = $nrc_email_share;
	}

	/**
	 * @param field_type $posts
	 */
	public function setPosts($posts) 
	{
		$this->posts = $posts;
	}

	/**
	 * @param field_type $reads
	 */
	public function setReads($reads) 
	{
		$this->reads = $reads;
	}

	/**
	 * @param field_type $text
	 */
	public function setText($text) 
	{
		$this->text = $text;
	}

	/**
	 * @param field_type $unconfirmed_uid
	 */
	public function setUnconfirmedUid($unconfirmed_uid) 
	{
		$this->unconfirmed_uid = $unconfirmed_uid;
	}

	/**
	 * @param field_type $verified
	 */
	public function setVerified($verified) 
	{
		$this->verified = $verified;
	}
}
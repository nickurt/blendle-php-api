<?php

namespace Blendle\Model;

class User {
	protected $id;
	protected $username;
	protected $followers;
	protected $follows;
	protected $posts;
	protected $reads;
	protected $text;
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
	 * @return the $followers
	 */
	public function getFollowers() 
	{
		return $this->followers;
	}

	/**
	 * @return the $follows
	 */
	public function getFollows() 
	{
		return $this->follows;
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
		return $this;
	}

	/**
	 * @param field_type $username
	 */
	public function setUsername($username) 
	{
		$this->username = $username;
		return $this;
	}

	/**
	 * @param field_type $followers
	 */
	public function setFollowers($followers) 
	{
		$this->followers = $followers;
		return $this;
	}

	/**
	 * @param field_type $follows
	 */
	public function setFollows($follows) 
	{
		$this->follows = $follows;
		return $this;
	}

	/**
	 * @param field_type $posts
	 */
	public function setPosts($posts) 
	{
		$this->posts = $posts;
		return $this;
	}

	/**
	 * @param field_type $reads
	 */
	public function setReads($reads) 
	{
		$this->reads = $reads;
		return $this;
	}

	/**
	 * @param field_type $text
	 */
	public function setText($text) 
	{
		$this->text = $text;
		return $this;
	}

	/**
	 * @param field_type $verified
	 */
	public function setVerified($verified) 
	{
		$this->verified = $verified;
		return $this;
	}
}
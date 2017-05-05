<?php
require_once 'DB.class.php';
require_once 'UserTools.class.php';
require_once 'User.class.php';

class blog {
	public $id;
	public $title;
	public $content;
	public $category;
	public $postdate;
	
	function __construct($data) {
		$this->id = (isset($data['id'])) ? $data['id'] : "";
		$this->title =(isset($data['title'])) ? $data['title'] : "";
		$this->category =(isset($data['category'])) ? $data['category'] : "";
		$this->content = (isset($data['content'])) ? $data['content'] : "";
		$this->date = (isset($data['date'])) ? $data['date'] : "";

	}
	
	public function save($isNewPost = false) {
		//create new db object
		$db = new DB();
		
		//update post if already created
		if(!isNewPost) {
			$data = array (
				"title" => "'$this->title'",
				"category" => "'$this->category'",
				"content" => "'$this->content'",
			);
			
			//update row in db
			$db->update($data, 'blogposts', 'id = '.$this->id);
		}else {
			//if new post
			$data = array(
				"title" => "'$this->title'",
				"category" => "'$this->category'",
				"content" => "'$this->content'",
				"date" => "'".date("Y-m-d H:i:s",time())."'"
			);
			
			$this->id = $db->insert($data, 'blogposts');
			$this->postdate = time();
		}
		return true;
	}
	
}
?>
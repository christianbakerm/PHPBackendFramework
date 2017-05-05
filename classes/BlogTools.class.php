<?php

require_once 'DB.class.php';
require_once 'Blog.class.php';

class Blogtools {
	
	//Check to see if a blog title exists.
	//This is called during posting to make sure all blog names are unique.
	public function checkBlogExists($title) {
		$result = mysql_query("select id from blogposts where title='$title'");
    	if(mysql_num_rows($result) == 0)
    	{
			return false;
	   	}else{
	   		return true;
		}
	}
	
	public function get($id)
	{
		$db = new DB();
		$result = $db->select('blogposts', "id = $id");
		
		return new Blog($result);
	}
}

?>
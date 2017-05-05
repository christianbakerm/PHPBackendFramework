<?php
require_once 'UserTools.class.php';
require_once 'DB.class.php';


class User {

	public $id;
	public $username;
	public $hashedPassword;
	public $email;
	public $joinDate;
	public $fname;
	public $lname;
	public $age;
	public $education;
	public $position;
	public $company;

	//Constructor is called whenever a new object is created.
	//Takes an associative array with the DB row as an argument.
	function __construct($data) {
		$this->id = (isset($data['id'])) ? $data['id'] : "";
		$this->username = (isset($data['username'])) ? $data['username'] : "";
		$this->hashedPassword = (isset($data['password'])) ? $data['password'] : "";
		$this->email = (isset($data['email'])) ? $data['email'] : "";
		$this->joinDate = (isset($data['join_date'])) ? $data['join_date'] : "";
		$this->fname = (isset($data['fname'])) ? $data['fname'] : "";
		$this->lname = (isset($data['lname'])) ? $data['lname'] : "";
		$this->age = (isset($data['age'])) ? $data['age'] : "";
		$this->education = (isset($data['education'])) ? $data['education'] : "";
		$this->position = (isset($data['position'])) ? $data['position'] : "";
		$this->company = (isset($data['company'])) ? $data['company'] : ""; 
	}

	public function save($isNewUser = false) {
		//create a new database object.
		$db = new DB();
		
		//if the user is already registered and we're
		//just updating their info.
		if(!$isNewUser) {
			//set the data array
			$data = array(
				"username" => "'$this->username'",
				"password" => "'$this->hashedPassword'",
				"email" => "'$this->email'",
				"fname" => "'$this->fname'",
				"lname" => "'$this->lname'",
				"age" => "'$this->age'",
				"education" => "'$this->education'",
				"position" => "'$this->position'",
				"company" => "'$this->company'" ,
			);
			
			//update the row in the database
			$db->update($data, 'users', 'id = '.$this->id);
		}else {
		//if the user is being registered for the first time.
			$data = array(
				"username" => "'$this->username'",
				"password" => "'$this->hashedPassword'",
				"email" => "'$this->email'",
				"join_date" => "'".date("Y-m-d H:i:s",time())."'"
			);
			
			$this->id = $db->insert($data, 'users');
			$this->joinDate = time();
		}
		return true;
	}
	
}

?>
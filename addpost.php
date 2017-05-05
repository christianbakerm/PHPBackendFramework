<?php 

require_once 'includes/global.inc.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

//get the blog object from the session
$user = unserialize($_SESSION['user']);
$blog = unserialize($_SESSION['blog']);

//initialize php variables used in the form
$title = $blog->title;
$message = "";
$category = $blog->category ;
$content = $blog->content ;

//check to see that the form has been submitted
if(isset($_POST['submit-settings'])) { 

	//retrieve the $_POST variables
	$title = $_POST['title'];
	$category = $_POST['category'];
	$content = $_POST['content'];
	
	//initialize variables for validation
	$success = true;
	
	if($success)
	{
		//prep data
		$data['title'] = $title;
		$data['category'] = $content;
		$data['content'] = $content;
		
		//create new blog object
		$newblog = new blog($data);
		
		//save
		$newblog->save(true);
	}

	$message = "Post added<br/>";
}

if(isset($_POST['go-back'])) {
	header("Location: index.php");
}

//If the form wasn't submitted, or didn't validate
//then we show the post form again
?>


<html>
<head>
	<title>Add Post </title>
</head>
<body>
	<?php echo $message; ?>

	<form action="addpost.php" method="post">
	
	Title: <input type="text" value="<?php echo $title; ?>" name="title" /><br/>
	Category: <input type="text" value="<?php echo $category; ?>" name="category" /><br/>
	Content: <textarea type="text" value="<?php echo $content; ?>" name="content"></textarea><br/>
	<input type="submit" value="Post" name="submit-settings">
	<input type="submit" value="Back" name="go-back" />
	
	</form>
</body>
</html>
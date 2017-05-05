<?php 

require_once 'includes/global.inc.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

//get the user object from the session
$user = unserialize($_SESSION['user']);
$db = unserialize($_SESSION['db']);


//initialize php variables used in the form
$email = $user->email;
$message = "";
$lname = $user->lname ;
$fname = $user->fname ;
$age = $user->age ;
$education = $user->education ;
$position = $user->position ;
$company = $user->company ;

//check to see that the form has been submitted
if(isset($_POST['submit-settings'])) { 

	//retrieve the $_POST variables
	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$age = $_POST['age'];
	$education = $_POST['education'];
	$position = $_POST['position'];
	$company = $_POST['company'];
	
	$user->email = $email;
	$user->fname = $fname; 
	$user->lname = $lname;
	$user->age = $age;
	$user->education = $education;
	$user->position = $position;
	$user->company = $company;

	$user->save();

	$message = "Settings Saved<br/>";
}

if(isset($_POST['go-back'])) {
	header("Location: index.php");
}

//If the form wasn't submitted, or didn't validate
//then we show the registration form again
?>


<html>
<head>
	<title>Change Settings</title>
</head>
<body>
	<?php echo $message; ?>

	<form action="settings.php" method="post">
	
	E-Mail: <input type="text" value="<?php echo $email; ?>" name="email" /><br/>
	First Name: <input type="text" value="<?php echo $fname; ?>" name="fname" /><br/>
	Last Name: <input type="text" value="<?php echo $lname; ?>" name="lname" /><br/>
	Age: <input type="text" value="<?php echo $age; ?>" name="age" /><br/>
	Education: <input type="text" value="<?php echo $education; ?>" name="education" /><br/>
	Position: <input type="text" value="<?php echo $position; ?>" name="position" /><br/>
	Company: <input type="text" value="<?php echo $company; ?>" name="company" /><br/>
	<input type="submit" value="Update" name="submit-settings" />
	<input type="submit" value="Back" name="go-back" />
	</form>
	<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>
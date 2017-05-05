<?php

require_once 'includes/global.inc.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

//get the user object from the session
$user = unserialize($_SESSION['user']);

//initialize variables
$email = $user->email;
$date = $user->joinDate;

//return to homepage
if(isset($_POST['go-back'])) {
	header("Location: index.php");
}
?>
<html>
<head>
	<title>View Profile</title>
</head>
<body>
	<?php echo $message; ?>
	Hello, <?php echo $user->fname, " ", $user->lname ?>
	</br>Email: <?php echo $email; ?>
	</br>Age: <?php echo $user->age; ?>
	</br>Education: <?php echo $user->education; ?>
	</br>Position: <?php echo $user->position; ?>
	</br>Company: <?php echo $user->company; ?>
	</br>Member Since: <?php echo $date; ?>

	<form action="profile.php" method="POST">
	<input type="submit" value="Back" name="go-back"/>
	</form>
</body>
</html>


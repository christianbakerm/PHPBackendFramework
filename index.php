<?php
//index.php 
 
require_once 'includes/global.inc.php';
?>
 
<html>
<head>
    <title>Homepage</title>
</head>
<body>
<?php if(isset($_SESSION['logged_in'])) : ?>
    <?php $user = unserialize($_SESSION['user']); 
	$username = $user->username;?>
    Hello, <?php echo $user->username; ?>. You are logged in. <a href="logout.php">Logout</a> | <a href="settings.php">Edit Profile</a> |
	<a href="profile.php">View Profile</a> | <a href="addpost.php">Add Post</a> | <a href="viewposts.php">View Post</a></br>
	<img src= <?php echo 'images/'.$username.'/profile./*' ?> >
	<?php else : ?>
    You are not logged in. <a href="login.php">Log In</a> | <a href="register.php">Register</a>
<?php endif; ?>
 
</body>
</html>
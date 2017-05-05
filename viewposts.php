<?php

require_once 'includes/global.inc.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

//get the user object from the session
$user = unserialize($_SESSION['user']);
$blog = unserialize($_SESSION['blog']);

if(isset($_POST['go-back'])) {
	header("Location: index.php");
}

//query db
$query = 'SELECT * FROM blogposts';
$result = mysql_query($query) or die('Error, insert failed');
$row=0;
$numrows=mysql_num_rows($result);

?>
<head>
<title>View Posts</title></head>
<body>
<form action="" method="post">
<input type="submit" value="Back" name="go-back" /></form>
</body>
<?php
while($row<$numrows)
{
	$id=mysql_result($result,$row, 'id');
	$title=mysql_result($result,$row, 'title');
	$category=mysql_result($result,$row, 'category');
	$content=mysql_result($result,$row, 'content'); ?>

	<td>Title: <?php echo $title; ?></td></br>
	<th>Category: <?php echo $category; ?></th></br>
	<th>Content: <?php echo $content; ?></th></br></br>
	<?php
	$row++;
}
?>
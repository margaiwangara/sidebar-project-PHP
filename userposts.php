<?php

//start session
session_start();

//connect to db
require_once("db/dbaccess.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//get post from user
	$user_id = $_SESSION['user_id'];
	$post = @mysql_real_escape_string($_POST['user_posts']);
	$post_privacy = @mysql_real_escape_string($_POST['post_privacy']);

	if(empty($post) || empty($post_privacy))
		echo "<font color='red'>No fields should be left blank</font>";
	else
	{
		//input into database
		$sendpost = mysqli_query($conn,"INSERT INTO posts(poster_id,post,privacy) VALUES('$user_id','$post','$post_privacy')");
		if(!$sendpost)
			echo "<font color='red'>Not Posted</font>";
		else
			echo "<font color='green'>Posted</font>";
	}
	
}

?>
<?php

//session start 
session_start();

//get db
require_once("db/dbaccess.php");


	$user_id = $_SESSION['user_id'];
	$user_email = $_SESSION['email'];
	$user_name = $_SESSION['name'];
	$message = @mysql_real_escape_string($_POST['usermessage']);

	echo $user_email;
	if(!empty($user_id) && !empty($user_email))
	{
		$insertchat = mysqli_query($conn, "INSERT INTO chatroom(sender_id,message) VALUES('$user_email','$message')");
		if($insertchat)
		{
			echo "Message sent";
		}
		else
		{
			echo "Message not sent";
		}
	}
	else
		echo "No empty postings";



?>
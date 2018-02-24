<?php

//start session
session_start();

//connect to db
require_once("db/dbaccess.php");

$msgupdate = "";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//get info from form
	$sender_id = $_SESSION['user_id'];
	$rec_id = @mysql_real_escape_string($_POST['rec_id']);
	$message = @mysql_real_escape_string($_POST['messagearea']);

	//quick code to copy data from one table to another
	$quickgrab = mysqli_query($conn,"SELECT *,reg_id FROM signuptest WHERE email = '$rec_id'");
	if(mysqli_num_rows($quickgrab) > 0)
	{
		$grabnumber = mysqli_fetch_assoc($quickgrab);
		$rec_id = $grabnumber['reg_id'];
		$_SESSION['friend_id'] = $rec_id;

		//send message
		$sendmessage = mysqli_query($conn,"INSERT INTO messagetest(sender_id,rec_id,message,status) VALUES('$sender_id','$rec_id','$message','unread')");
		if(!$sendmessage)
			$msgupdate = "<font color='red'>Message not sent to database</font>";
		else
			$msgupdate = "<font color='green'>Message sent</font>";
	}
	else
		$msgupdate = "<font color='red'>You can't send message because the receiver is not on CodeFaceOff</font>";

		echo json_encode(array('msgupdate'=>$msgupdate));
}


?>

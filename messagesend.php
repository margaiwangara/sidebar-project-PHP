<?php


//start session
session_start();

//connect to db
require_once("db/dbaccess.php");

//initialize user id
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$rec_id = @mysql_real_escape_string($_POST['rec_email']);
$message = @mysql_real_escape_string($_POST['message']);
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($rec_id) || empty($message))
		$error = "<font color='red'>No field should be left blank</font>";

	else
	{
		//get id from the people involved
		$getid = mysqli_query($conn, "SELECT * FROM signuptest WHERE email = '$rec_id'");
		if(mysqli_num_rows($getid) > 0)
		{
			$a_id = mysqli_fetch_assoc($getid);
			$uid = $a_id['reg_id'];

			if($uid == $user_id)
				$error = "<font color='red'>You cannot send a message to yourself</font>";
			else
			{
				//insert message into db
				$sendmessages = mysqli_query($conn,"INSERT INTO messagetest(rec_id,message,sender_id,status) VALUES('$uid','$message','$user_id','unread')");
				if($sendmessages)
					$error = "<font color='green'>Message Sent</font>";
				else
					$error = "<font color='red'>Message not sent</font>";
			}
			
		}
		else
			$error = "<font color='red'>Receiver is not a faceoffer</font>";
	}

	echo $error;
	
}


?>
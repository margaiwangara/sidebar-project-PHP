<?php

//session start
session_start();

//db connect
require_once("db/dbaccess.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$user_id = $_SESSION['user_id'];


	$messages = [];
	$sender_id = [];
	//get data from db
	$getmessage = mysqli_query($conn, "SELECT * FROM messagetest WHERE rec_id = '$user_id' ORDER BY msg_id DESC");
	if(mysqli_num_rows($getmessage) > 0)
	{
		$count = 0;
		while($messagecoll = mysqli_fetch_assoc($getmessage))
		{
			$messages[] = $messagecoll['message'];
			$sender_id[] = $messagecoll['sender_id'];
			$status[] = $messagecoll['status'];

			if($status[$count] == 'unread')
			{
				$ur_sender_id[] = $sender_id[$count];
				$ur_message[] = $messages[$count]; 
			}
			else if($status[$count] == 'read')
			{
				$r_sender_id[] = $sender_id[$count];
				$r_message[] = $sender_id[$count]; 
			}
		
			//get sender name from db
			$getname = mysqli_query($conn, "SELECT * FROM signuptest WHERE reg_id = '$sender_id[$count]'");
			if(mysqli_num_rows($getname) > 0)
			{
				while($sender_name = mysqli_fetch_assoc($getname))
				{
					$s_name[] = ucwords($sender_name['name']);
					$s_email[] = $sender_name['email'];
				}
				
			}
			$count++;
		}
	}

	echo json_encode(array('messages'=>$messages,'sender_id'=>$sender_id,'sender_name'=>$s_name,'my_id'=>$user_id,'emails'=>$s_email));
}

?>
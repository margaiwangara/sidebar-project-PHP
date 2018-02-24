<?php

//start session
session_start();

//connect to db
require_once("db/dbaccess.php");
	
	//get user id
	$user_id = $_SESSION['user_id'];

	//a very tricky code here, i really have no idea what am doing
	$getmessages = mysqli_query($conn,"SELECT * FROM messagetest WHERE sender_id !='$user_id' AND rec_id = '$user_id' ORDER BY msg_id DESC");
	if(mysqli_num_rows($getmessages) > 0)
	{
		while($messagepack = mysqli_fetch_assoc($getmessages))
		{
			$mymessages[] = $messagepack['message'];
			$sender_id[] = $messagepack['sender_id'];
		}

		echo json_encode(array('messages'=>$mymessages,'sender_id'=>$sender_id));
	}
	else
		echo "No data to display";
<?php

//start session
session_start();

//connect to db
require_once("db/dbaccess.php");

	$user_id = $_SESSION['user_id'];
	//initialize error variable
	$error = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//get data from the user
	$receiver_id = @mysql_real_escape_string($_POST['info']);

	//check if this request already exists in the db
	$checkexistance = mysqli_query($conn,"SELECT * FROM friends WHERE (rsender_id = '$user_id' AND r_receiver_id = '$receiver_id') OR (rsender_id = '$receiver_id' AND r_receiver_id = '$user_id')");
	if(mysqli_num_rows($checkexistance) > 0)
		$error = "<font color='red'>Request already exists</font>";
	else
	{
		//send data to db
		$friend_request = mysqli_query($conn,"INSERT INTO friends(rsender_id,r_receiver_id,status) VALUES('$user_id','$receiver_id','pending')");
		if(!$friend_request)
			$error = "<font color='red'>Request not sent to db</font>";
		else
			$error = "<font color='green'>Request Success</font>";
	}
	

	echo $error;
}
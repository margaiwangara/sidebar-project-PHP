<?php

//session start
session_start();

//connect to db
require_once("db/dbaccess.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//get data from the user now
	$user_id = $_SESSION['user_id'];
	$friend_id = @mysql_real_escape_string($_POST['req_id']);

	//now update the status
	$tofriend = mysqli_query($conn, "UPDATE friends SET status = 'friend' WHERE rsender_id ='$friend_id' AND r_receiver_id = '$user_id'");
	if($tofriend)
		echo 1;
	else
		echo 0;
}


?>
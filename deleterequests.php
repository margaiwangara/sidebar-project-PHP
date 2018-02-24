<?php

//session start
session_start();

//connect to db
require_once("db/dbaccess.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	//get data from the user now
	$user_id = $_SESSION['user_id'];
	$friend_id = @mysql_real_escape_string($_POST['req_id']);

	//now update the status
	$req_delete = mysqli_query($conn, "DELETE FROM friends WHERE rsender_id = '$friend_id' AND r_receiver_id = '$user_id'");
	if($req_delete)
		echo 1;
	else
		echo 0;
}

?>
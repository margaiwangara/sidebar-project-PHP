<?php

//start session
session_start();

//connect to db
require_once("db/dbaccess.php");

$message = "";$newbie = "";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//get form data
	$email = @mysql_real_escape_string($_POST['loginemail']);
	$password = @mysql_real_escape_string(md5($_POST['loginpass']));

	//check non input/blank input
	if(empty($email) && empty($password))
		$message = "<font color='red'>All fields must be filled</font>";
	else
	{
		//check if input is correct in the database
		$confirminfo = mysqli_query($conn,"SELECT * FROM signuptest WHERE email='$email' AND password='$password'");
		if(mysqli_num_rows($confirminfo) > 0)
		{
			mysqli_query($conn,"UPDATE signuptest SET guest_rating = '1' WHERE email = '$email'");
			$getdata = mysqli_fetch_assoc($confirminfo);

			//$message = "<font color='green'>Login Success</font>";
			$message = 1;
			echo json_encode(array('message'=>$message));

			//store the data in a session
			$_SESSION['user_id'] = $getdata['reg_id'];
			$_SESSION['email'] = $email;
			$_SESSION['name'] = ucwords($getdata['name']);
			$_SESSION['confirmcode'] = $getdata['confirmcode']; 
		}
		else
		{
			$message = "<font color='red'>Invalid Username/Password</font>";
			echo json_encode(array('message'=>$message));
		}
	}
	
}


?>
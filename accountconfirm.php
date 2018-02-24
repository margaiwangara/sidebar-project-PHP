<?php

//session start 
session_start();

//connect to db
require_once("db/dbaccess.php");

//user_id initialization
$user_id = $_SESSION['user_id'];
$confirmcode = $_SESSION['confirmcode'];

$message = 1;

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$getdata = mysqli_query($conn,"SELECT * FROM signuptest WHERE reg_id = '$user_id'");
	if(mysqli_num_rows($getdata) > 0)
	{
		$getcode = mysqli_fetch_assoc($getdata);
		$reconfirm_code = $getcode['confirmcode'];
	}
	if($reconfirm_code == $confirmcode)
	{
		if($_SESSION['confirmcode'] != 0)
		{
			mysqli_query($conn,"UPDATE signuptest SET confirmcode = '0', confirmation_id = '1' WHERE reg_id = '$user_id'");
			$_SESSION['confirmcode'] = 0;
		}
	}
	else
		$message = "<font color='red'>Confirmation codes don't match</font>";

	echo $message;
}





?>
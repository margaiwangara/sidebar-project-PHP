<?php

//start session here
session_start();

//connect to db
require_once("db/dbaccess.php");

$errormessage = "";$newbie = 0;
//session user_id here
$my_id = $_SESSION['user_id'];


	//get data from db now
	$getnames = "SELECT * FROM signuptest WHERE reg_id != '$my_id' ORDER BY reg_id ASC";
	$query = mysqli_query($conn,$getnames);

	//check  if user is a newbie
	$user_guest = mysqli_query($conn,"SELECT * FROM signuptest WHERE reg_id = '$my_id' AND guest_rating = '1'");
	if(mysqli_num_rows($user_guest) > 0)
		$newbie = 1;
	

	if(mysqli_num_rows($query) > 0)
	{
		$rowdata = mysqli_num_rows($query);
		while($namebasket = mysqli_fetch_assoc($query))
		{
			$names_id[] = $namebasket['reg_id'];
			$namebox[] = ucwords($namebasket['name']);
		}

		$errormessage = 1;
		echo json_encode(array('names'=>$namebox,'message'=>$errormessage,'is_newbie'=>$newbie,'names_id'=>$names_id,'rowdata'=>$rowdata));
	}
	else
	{
		$errormessage = 0;	
	}







/*
$user_id = $_SESSION['user_id'];
mysqli_query($conn,"SELECT signuptest.name FROM signuptest,friends WHERE friends.rsender_id != signuptest.reg_id AND friends.r_receiver_id != signuptest.reg_id AND signuptest.reg_id != '$user_id'");
*/
?>






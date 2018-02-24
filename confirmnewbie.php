<?php

//session start
session_start();

//connect to db
require_once("db/dbaccess.php");

//session declaration
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];

$newbie = mysqli_query($conn,"SELECT * FROM signuptest WHERE (email='$email' OR reg_id='$user_id') AND guest_rating = '1'");
if(mysqli_num_rows($newbie) > 0)
{
	$getnewbie = 1
	echo $confirmnewbie;
}
else
{
	echo 0;
}



?>
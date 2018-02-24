<?php

//involve db
require_once("db/dbaccess.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email = @mysql_real_escape_string($_POST['loginemail']);
	$password = @mysql_real_escape_string($_POST['loginpass']);

	//password encryption and salting 
	$salt1 = "!@^%^*+-#";
	$salt2 = "#-+wash!^li";
	$encpass = hash("md5", $salt1.$password.$salt2);

	$getdata = "SELECT * FROM memberise WHERE email = '$email' AND password ='$encpass'";
	$query = mysqli_query($conn,$getdata);

	if(mysqli_num_rows($query)>0)
		echo "<font color='green'>Login Success</font>";
	else
		echo "<font color='red'>Login Failed</font>";
}


?>
<?php

//start session
session_start();

//connect to db
require_once("db/dbaccess.php");

$errormess = 1;
if($_SERVER["REQUEST_METHOD"] == "POST")
{

	//get data from form
	$username = @mysql_real_escape_string($_POST['username']);
	$password = @mysql_real_escape_string(md5($_POST['userpass']));
	$email = @mysql_real_escape_string($_POST['useremail']);
	$bday = @mysql_real_escape_string($_POST['dday']);
	$bmonth = @mysql_real_escape_string($_POST['dmonth']);
	$byear = @mysql_real_escape_string($_POST['dyear']);

	$confirmcode = rand(1965,101996);

	if(empty($username) && empty($password) && empty($email))
		$errormess = "<font color='red'>All fields must be filled</font>";
	else
	{
		//check if email already exists in the database to prevent multiple registration
		$restrictmultiple = mysqli_query($conn, "SELECT * FROM signuptest WHERE email = '$email'");
		if(mysqli_num_rows($restrictmultiple)>0)
			$errormess = "<font color='red'>This email already exists in our database</font>";
		else
		{

			//insert data into database
			$register = mysqli_query($conn,"INSERT INTO signuptest(email,name,password,bday,bmonth,byear,guest_rating,confirmcode,confirmation_id) VALUES('$email','$username','$password','$bday','$bmonth','$byear','0','$confirmcode','0')");
			if(!$register)
				$errormess = "<font color='red'>Input into database failed</font>";
			else
			{	
				$forceddata = mysqli_query($conn,"SELECT * FROM signuptest WHERE email = '$email'");
				$getforceddata = mysqli_fetch_assoc($forceddata);
				$forcedid = $getforceddata['reg_id'];

				$_SESSION['user_id'] = $forcedid;
				$_SESSION['email'] = $email;
				$_SESSION['name'] = ucwords($username);
				$_SESSION['confirmcode'] = $confirmcode;
			}
		}
		
	}
	echo $errormess;


}
?>
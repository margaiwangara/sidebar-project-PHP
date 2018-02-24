<?php

//session here 
session_start();

//database connection
require_once("db/dbaccess.php");

$errormes = "";
$user_id = $_SESSION['user_id'];
$getdata = mysqli_query($conn,"SELECT * FROM signuptest WHERE reg_id = '$user_id'");
if(mysqli_num_rows($getdata) > 0)
{
	$mydata = mysqli_fetch_assoc($getdata);
	$name = ucwords($mydata['name']);
	$dobday = $mydata['bday'];
	$dobmonth = $mydata['bmonth'];
	$dobyear = $mydata['byear'];
	$myemail = $mydata['email'];
}
else
	$errormes = "<font color='red'>There is no data here</font>";

echo json_encode(array('name'=>$name,'bday'=>$dobday,'bmonth'=>$dobmonth,'byear'=>$dobyear,'email'=>$myemail));



?>
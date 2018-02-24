<?php

//connect to db
require_once("db/dbaccess.php");

//acquire form data
$firstname = @mysql_real_escape_string($_POST['firstname']);
$lastname = @mysql_real_escape_string($_POST['lastname']);
$dobday = @mysql_real_escape_string($_POST['dobday']);
$dobmonth = @mysql_real_escape_string($_POST['dobmonth']);
$dobyear = @mysql_real_escape_string($_POST['dobyear']);
$university = @mysql_real_escape_string(ucwords($_POST['university']));
$college = @mysql_real_escape_string(ucwords($_POST['college']));
$highschool = @mysql_real_escape_string(ucwords($_POST['hschool']));
$primaryschool = @mysql_real_escape_string(ucwords($_POST['primary']));
$work_info = @mysql_real_escape_string(ucwords($_POST['work']));

//change it back to numbers
$dobmonth = strtolower($dobmonth);

switch($dobmonth)
	{
		case "january":$dobmonth = 1;break;
		case "february":$dobmonth = 2;break;
		case "march":$dobmonth = 3;break;
		case "april":$dobmonth = 4;break;
		case "may":$dobmonth = 5;break;
		case "june":$dobmonth = 6;break;
		case "july":$dobmonth = 7;break;
		case "august":$dobmonth = 8;break;
		case "september":$dobmonth = 9;break;
		case "october":$dobmonth = 10;break;
		case "november":$dobmonth = 11;break;
		case "december":$dobmonth = 12;break;
		default:break;
	}

$updateprofile = mysqli_query($conn,"UPDATE memberise SET firstname = '$firstname',lastname='$lastname',dobday='$dobday',dobmonth = '$dobmonth',dobyear = '$dobyear' WHERE user_id='2'");
if(!$updateprofile)
	echo "Update Failed ";
	

$updateother =mysqli_query($conn,"UPDATE user_info SET work_info = '$work_info',primaryschool = '$primaryschool',college = '$college',university ='$university',highschool = '$highschool' WHERE user_id='2'");
if(!$updateother)
	echo "UpdateOther Failed ";
	










?>
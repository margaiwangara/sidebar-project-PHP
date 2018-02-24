<?php

//start session
session_start();

//connect to db
require_once("db/dbaccess.php");


	//get user data
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['name'];
	$user_email = $_SESSION['email'];

	//get data from database
	$getinfo = mysqli_query($conn,"SELECT * FROM signuptest WHERE reg_id = '$user_id'");
	//echo mysqli_num_rows($getinfo);
	if(mysqli_num_rows($getinfo) > 0)
	{
		$allinfo = mysqli_fetch_assoc($getinfo);
		if(!empty($allinfo['bday']))
		{
			$dobday = $allinfo['bday'];
			$dobmonth = $allinfo['bmonth'];
			$dobyear = $allinfo['byear'];
		}
		else
		{
			$dobday = "<i><font color='brown'>DD / </i></font>";
			$dobmonth = "<i><font color='brown'>MM / </i></font>";
			$dobyear = "<i><font color='brown'>YY</i></font>";
		}
		$getotherinfo = mysqli_query($conn, "SELECT * FROM user_info WHERE user_id = '$user_id'");
		if(mysqli_num_rows($getotherinfo) > 0)
		{
			$university = $allinfo['university'];
			$college = $allinfo['university'];
			$highschool = $allinfo['highschool'];
			$primary = $allinfo['primary'];
			$work = $allinfo['work'];
			$hobbies = $allinfo['hobbies'];
			$likes = $allinfo['likes'];
		}
		else
		{
			$university = "<i><a href=''>Click here to update university info</a></i>";
			$college = "<i><a href=''>Click here to update your college info</a></i>";
			$highschool = "<i><a href=''>Click here to update your high school info</a></i>";
			$primary = "<i><a href=''>Click here to update your primary school info</a></i>";
			$work = "<i><a href=''>Click here to update work info</a></i>";
			$hobbies = "<i><a href=''>Click here to update your hobbies</i></font>";
			$likes = "<i><a href=''>Click here to update your likes</a></i>";
		}
		
	}
	else
	{
		$dobday = "<i><font color='brown'>Click here to update your date of birth</i></font>";
		$dobmonth = "<i><font color='brown'>Click here to update your date of birth</i></font>";
		$dobyear = "<i><font color='brown'>Click here to update your date of birth</i></font>";
	}

	echo json_encode(array('day'=>$dobday,'month'=>$dobmonth,'year'=>$dobyear,'university'=>$university,'college'=>$college,'highschool'=>$highschool,'primary'=>$primary,'work'=>$work,'name'=>$user_name,'email'=>$user_email,'hobbies'=>$hobbies,'likes'=>$likes));




?>
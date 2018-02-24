<?php

//session start
session_start();
if(!empty($_SESSION['user_id']) || !empty($_SESSION['email']))
{
	if(session_destroy())
	{
		header("Refresh: 3; url=signup.php");
		echo "<font color='green' style='font-family:calibri;'>Logout Success. Redirecting...</font>";
	}

}
?>
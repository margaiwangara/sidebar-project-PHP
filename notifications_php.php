<?php

//session start
session_start();

//call db
require_once("db/dbaccess.php");

//initialize all the data
$bmessage = $bfmessage = $frequest = $error = $bferror = $freqerror = $all_names = "";

//initialize array 
$f_id = [];
$f_id2 = [];
$f_id_scrubbed = [];
$f_id2_scrubbed = [];
$sender_ids = [];
$friendcount = 0;

//user data
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];

$tday = date("d");
$tmonth = date("F");
$tyear = date("Y");



	//get birtday data
	$getbirthday = mysqli_query($conn,"SELECT * FROM signuptest WHERE reg_id = '$user_id'");
	if(mysqli_num_rows($getbirthday) > 0)
	{
		$collectbday = mysqli_fetch_assoc($getbirthday);
		$bday = $collectbday['bday'];
		$bmonth = $collectbday['bmonth'];
		$byear = $collectbday['byear'];

		if($bmonth == $tmonth && $bday == $tday)
			$bmessage = "Happy birthday ".$user_name.". You are ".($tyear-$byear)." now. I bet you are reconsidering your life choices.";
		else
			$error = "No birthday here";

	}
	else
		$error = "Nothing here1";

	//initialize some variable here
	$count = 0;$datacount = 0;$fcount = 0;$f2count = 0;
	$friendbday = mysqli_query($conn, "SELECT * FROM friends WHERE (rsender_id = '$user_id' OR r_receiver_id = '$user_id') AND status = 'friend'");
	//echo "Rows: ".mysqli_num_rows($friendbday);
	if(mysqli_num_rows($friendbday) > 0)
	{
		while($getfdata = mysqli_fetch_assoc($friendbday))
		{
			$f_id[] = $getfdata['rsender_id'];
			$f_id2[] = $getfdata['r_receiver_id'];
		}
		if(!empty($f_id))
		{
			foreach($f_id as $value)
			{
				if($value != $user_id)
					$f_id_scrubbed[] = $value; 
			}
		}
		
		if(!empty($f_id2))
		{
			foreach ($f_id2 as $value)
			{
				if($value != $user_id)
					$f_id2_scrubbed[] = $value;
			}
		}
		

		//merge the two arrays as one
		$combinedata = array_merge($f_id_scrubbed,$f_id2_scrubbed);
		$friendcount = count($combinedata);

		$count = 0;$datacount = 0;
		while ($count < count($combinedata))
		{
			$fscrub = mysqli_query($conn, "SELECT * FROM signuptest WHERE reg_id = '$combinedata[$count]'");
			if(mysqli_num_rows($fscrub) > 0)
			{
				while($scrubdata = mysqli_fetch_assoc($fscrub))
				{
					$aday[] = $scrubdata['bday'];
					$amonth[] = $scrubdata['bmonth'];
					$ayear[] = $scrubdata['byear'];
					$fname[] = ucwords($scrubdata['name']);

					if($aday[$datacount] == $tday && $amonth[$datacount] == $tmonth)
					{
						$bfmessage[] = "Your friend <span style='color:brown;font-family:cambria;cursor:pointer;'>".ucwords($fname[$datacount])."</span> has a birthday today. Ask him/her lots of questions about his/her life choices, then start asking yourself too";	
					}
					$datacount++;
				}

					
			}
				else
					$error = "No names here";
			$count++;	
		}
		
	}
	else
		$error = "No friends bday here";

	$rcount = 0;$ncount = 0;
	//get friend requests now
	$getrequests = mysqli_query($conn, "SELECT * FROM friends WHERE r_receiver_id = '$user_id' AND status = 'pending' ORDER BY friend_id ASC");
	if(mysqli_num_rows($getrequests) > 0)
	{
		while($arequests = mysqli_fetch_assoc($getrequests))
		{
			$sender_ids[] = $arequests['rsender_id'];
		
			$getsendernames = mysqli_query($conn, "SELECT * FROM signuptest WHERE reg_id = '$sender_ids[$rcount]'");
			if(mysqli_num_rows($getsendernames) > 0)
			{
				
				while($sender_names = mysqli_fetch_assoc($getsendernames))
				{
					$all_names[] = ucwords($sender_names['name']);
					$frequest[] = "You have a friend request from <a href=''>".$all_names[$ncount]."</a>";
				}
				

			}
			$rcount++;$ncount++;
		} 
	}
	else
		$error = "No pending here";

	echo json_encode(array('user_birthday'=>$bmessage,'user_friend_birthday'=>$bfmessage,'user_pending_request'=>$frequest,'errortext'=>$error,'fsender_ids'=>$sender_ids,'friendcount'=>$friendcount,'friendsname'=>$fname));
?>
<?php

//session declare 
session_start();

//db connect 
require_once("db/dbaccess.php");

$user_id = $_SESSION['user_id'];

$all_sids = [];
$all_rids = [];
$all_sids_sc = [];
$all_rids_sc = [];
$mutualsfriends = [];
$mutualrfriends = [];
$mutual_ids = [];
$mutual_s_sc = [];
$mutual_r_sc = [];
$all_ids = [];
$allmutual = [];

//get data from db
$getall = mysqli_query($conn, "SELECT * FROM friends WHERE (rsender_id = '$user_id' OR r_receiver_id = '$user_id') AND status = 'friend'");
if(mysqli_num_rows($getall) > 0)
{
	$count = 0;$countr = 0;$counts = 0;
	//get all the data
	while($adata = mysqli_fetch_assoc($getall))
	{
		$all_sids[] = $adata['rsender_id'];
		$all_rids[] = $adata['r_receiver_id'];
	}

	foreach($all_sids as $value)
	{
		if($value != $user_id)
			$all_sids_sc[] = $value;
	}
	foreach($all_rids as $value)
	{
		if($value != $user_id)
			$all_rids_sc[] = $value;
	}

	$all_ids = array_merge($all_sids_sc,$all_rids_sc);
	echo "Friends: ";
	print_r($all_ids);
	echo "<br/>";
	while(count($all_ids) > $count)
	{
		$getfriefrie = mysqli_query($conn, "SELECT * FROM friends WHERE (rsender_id = '$all_ids[$count]' OR r_receiver_id = '$all_ids[$count]') AND (rsender_id != '$user_id' OR r_receiver_id = '$user_id') AND status = 'friend' ORDER BY friend_id DESC");
		if(mysqli_num_rows($getfriefrie) > 0)
		{
			while($getmutual = mysqli_fetch_assoc($getfriefrie))
			{
				$mutualsfriends[] = $getmutual['rsender_id'];
				$mutualrfriends[] = $getmutual['r_receiver_id'];

			}
			
			}
		
		else
			echo "No mutual friends to show";

		$count++;
	}

	echo "Senders: ";
	print_r($mutualsfriends);

	echo "<br/>Receivers: ";
	print_r($mutualrfriends);
	
}

?>
<?php

//start session
session_start();

//db connect
require_once("db/dbaccess.php");


	//initialization
	$pubpostcoll = [];
	$pubposter = [];
	$posnamecoll = [];
	$pubmess = "";

	//get user id
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['name'];

	//get public posts
	$getpublicposts = mysqli_query($conn, "SELECT * FROM posts WHERE privacy = 'public' ORDER BY post_id DESC");
	if(mysqli_num_rows($getpublicposts) > 0)
	{
		$count = 0;
		while($publicpost = mysqli_fetch_assoc($getpublicposts))
		{
			$pubpostcoll[] = $publicpost['post'];
			$pubposter[] = $publicpost['poster_id'];
		
			//get the poster's names
			$getposnames = mysqli_query($conn, "SELECT * FROM signuptest WHERE reg_id = '$pubposter[$count]'");
			if(mysqli_num_rows($getposnames) > 0)
			{
				while($posnames = mysqli_fetch_assoc($getposnames))
				{
					$posnamecoll[] = ucwords($posnames['name']);
				}
			}
			$count++;
		}
	}
	else
		$pubmess = "No public posts here";

	//initialize posts
	$fripostcoll = [];
	$friposter = [];
	$fripostnamescoll = [];
	$frimess = "";

	//get friend only posts
	$getfriendsposts = mysqli_query($conn,"SELECT * FROM posts WHERE privacy = 'friends' ORDER BY post_id DESC");
	if(mysqli_num_rows($getfriendsposts) > 0)
	{
		$count = 0;
		while($friendsposts = mysqli_fetch_assoc($getfriendsposts))
		{
			$fripostcoll[] = $friendsposts['post'];
			$friposter[] = $friendsposts['poster_id'];

			//get posters names, this is so tedious
			$fripostnames = mysqli_query($conn,"SELECT * FROM signuptest WHERE reg_id = '$friposter[$count]'");
			if(mysqli_num_rows($fripostnames) > 0)
			{
				while($fripostnamers = mysqli_fetch_assoc($fripostnames))
				{
					$fripostnamescoll[] = ucwords($fripostnamers['name']);
				}
			}
			$count++;
		}
		
		//initialize variables
		$senfrienme = [];
		$recfrienme = [];
		$senonlyfri = [];
		$reconlyfri = [];

		//get all his/her friends and restrict posts only to them
		$getfriends = mysqli_query($conn,"SELECT * FROM friends WHERE (rsender_id = '$user_id' OR r_receiver_id = '$user_id') AND status = 'friend'");
		if(mysqli_num_rows($getfriends) > 0)
		{
			while($friexclusive = mysqli_fetch_assoc($getfriends))
			{
				$senfrienme[] = $friexclusive['rsender_id'];
				$recfrienme[] = $friexclusive['r_receiver_id'];
			}

			foreach($senfrienme as $value)
			{
				if($value != $user_id)
					$senonlyfri[] = $value;
			}

			foreach($recfrienme as $value)
			{
				if($value != $user_id)
					$reconlyfri[] = $value;
			}

			//make the arrays into one
			$allfriends = array_merge($senonlyfri,$reconlyfri);

		}

	}
	else
		$frimess = "No friends posts here";

	//initialize post
	$privpostcoll = [];
	$privmess = "";

	//get private posts
	$getprivateposts = mysqli_query($conn, "SELECT * FROM posts WHERE privacy = 'private' AND poster_id = '$user_id' ORDER BY post_id DESC");
	if(mysqli_num_rows($getprivateposts) > 0)
	{
		while($privatepost = mysqli_fetch_assoc($getprivateposts))
		{
			$privpostcoll[] = $privatepost['post']; 
		}
	}
	else
		$privmess = "No private posts here";

	echo json_encode(array('user_id'=>$user_id,'user_name'=>$user_name,'publicposts'=>$pubpostcoll,'pubnames'=>$posnamecoll,'puberror'=>$pubmess,'friendposts'=>$fripostcoll,'friendname'=>$fripostnamescoll,'friendsfriends'=>$allfriends,'privateposts'=>$privpostcoll,'priverror'=>$privmess,'frierror'=>$frimess,'pubposter'=>$pubposter));

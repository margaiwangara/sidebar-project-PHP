<?php

//start session
session_start();

//connect to db
require_once("db/dbaccess.php");

//error initialization
$message = "";

//user_id as always
$user_id = $_SESSION['user_id'];

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	//get data from sql---actually image paths
	$getimage = mysqli_query($conn,"SELECT * FROM user_images WHERE owner_id = '$user_id' AND img_type = 'profile'");
	if(mysqli_num_rows($getimage) > 0)
	{
		$grabimage = mysqli_fetch_assoc($getimage);
		$my_image = $grabimage['image'];
		$message = 1;
	}
	else
		$message = 0;
	echo json_encode(array('imagepath'=>$my_image,'confirmation'=>$message));
}


?>
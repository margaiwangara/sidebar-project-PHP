<?php

//start session
session_start();

//connect to db
require_once("db/dbaccess.php");
	
//initialize error
$imgerror = 1;

//owner_id initialization
$owner_id = $_SESSION['user_id'];
$owner_email = $_SESSION['email'];

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$image_directory = "uploads/";
	$image_file = $image_directory .basename($_FILES["userimage"]["name"]);
	$uploadSuccess = 1;
	$file_type = pathinfo($image_file,PATHINFO_EXTENSION);

	$imgerror = $image_file;
	// Check if image file is a actual image or fake image

	$checkimage = getimagesize($_FILES["userimage"]["tmp_name"]);
	if($checkimage != false)
	{
		$success = "File is an image - ".$checkimage["mime"]. ".";
		//echo json_encode(array('success'=>$success));
		$uploadSuccess = 1;
	}
	else
	{
		$imgerror = 0;
		$uploadSuccess = 0;
	}

	if(file_exists($image_file))
	{
		$imgerror = 0;
		$uploadSuccess = 0;
	}

	//check file size
	if($_FILES["userimage"]["size"] > 50000000)
	{
		$imgerror = 0;
		$uploadSuccess = 0;
	}
	
	//restrict file input to the image formats
	if($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg' && $file_type != 'gif' && $file_type != 'bmp')
	{
		$imgerror = 0;
		$uploadSuccess = 0;
	}
	//check if uploadSuccess is set to 0 by an error
	if($uploadSuccess == 0)
		$imgerror = 0;
	//if everything is in order, upload file
	else
	{
		if(move_uploaded_file($_FILES['userimage']['tmp_name'], $image_file))
		{
			//confirm if user already has a profile image then update it
			$imageconfirm = mysqli_query($conn,"SELECT * FROM user_images WHERE owner_id = '$owner_id' AND img_type = 'profile'");
			if(mysqli_num_rows($imageconfirm) > 0)
				mysqli_query($conn,"UPDATE user_images SET image = '$image_file' WHERE owner_id = '$owner_id'");
			else
			{
				$uploadimage = "INSERT INTO user_images(owner_id,image,img_type) VALUES('$owner_id','$image_file','profile')";
				$query = mysqli_query($conn,$uploadimage);
				
				if(!$query)
					$imgerror = 0;
			}
		}
		
		else
			$imgerror = 0;
	}

		echo $imgerror;

	
}

?>
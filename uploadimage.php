<?php

//connect to db
require_once("db/dbaccess.php");



	$image_directory = "uploads/";
	$image_file = $image_directory .basename($_FILES["userimage"]["name"]);
	$uploadSuccess = 1;
	$file_type = pathinfo($image_file,PATHINFO_EXTENSION);

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
		echo "File is not an image";
		$uploadSuccess = 0;
	}

	if(file_exists($image_file))
	{
		echo "Sorry, file already exists";
		$uploadSuccess = 0;
	}

	//check file size
	if($_FILES["userimage"]["size"] > 50000000)
	{
		echo "Sorry, your file is too large";
		$uploadSuccess = 0;
	}
	
	//restrict file input to the image formats
	if($file_type != 'jpg' && $file_type != 'png' && $file_type != 'jpeg' && $file_type != 'gif')
	{
		echo "Sorry only picture formats allowed(jpg, png, jpeg, gif)";
		$uploadSuccess = 0;
	}
	//check if uploadSuccess is set to 0 by an error
	if($uploadSuccess == 0)
		echo "Sorry, your file was not uploaded";
	//if everything is in order, upload file
	else
	{
		if(move_uploaded_file($_FILES['userimage']['tmp_name'], $image_file))
		{
			//echo "The file ". basename($_FILES['userimage']['name']). "has been uploaded";
			$uploadimage = "INSERT INTO images(owner_id,image,img_type) VALUES('2','$image_file','profile')";
			$query = mysqli_query($conn,$uploadimage);
			if(!$query)
				echo "Image upload to database failed";
			else
			{
				$getimages = "SELECT memberise.email,images.image,images.img_type FROM images INNER JOIN memberise ON memberise.user_id = images.owner_id ORDER BY img_id DESC";
				$imagesquery = mysqli_query($conn,$getimages);
				if(mysqli_num_rows($imagesquery) > 0)
				{
					$fetchdata = mysqli_fetch_assoc($imagesquery);
					$img_path = $fetchdata['image'];
					$img_type = $fetchdata['img_type'];
					$owner_email = $fetchdata['email'];
					echo $img_path;
				}
			}
		}
		
		else
			echo "Sorry, there was a problem uploading your file";
	}
	
	


?>
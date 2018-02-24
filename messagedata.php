<?php


//connect to db
require_once("db/dbaccess.php");

$error = "";
//get data from data
$getmessages = mysqli_query($conn, "SELECT * FROM messagetest WHERE rec_id='1' AND status='unread' ORDER BY msg_id DESC");
if(mysqli_num_rows($getmessages) > 0)
{
	while($messages = mysqli_fetch_assoc($getmessages))
	{
		$sender_id[] = $messages['sender_id'];
		$messagedata[] = $messages['message'];
	}

}
else
	$error = "No messages to show here";

echo json_encode(array('sender_id'=>$sender_id,'messages'=>$messagedata,'error'=>$error));


?>
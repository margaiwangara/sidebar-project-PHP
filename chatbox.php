<?php

//start session
session_start();

//connect to db
require_once("db/dbaccess.php");


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$user_id = $_SESSION['user_id'];
	$user_email = $_SESSION['email'];
	$user_name = $_SESSION['name'];

	$getchats = mysqli_query($conn, "SELECT * FROM chatroom ORDER BY chat_id ASC");
	if(mysqli_num_rows($getchats) > 0)
	{
		while($chats = mysqli_fetch_assoc($getchats))
		{
			$allchats[] = $chats['message'];
			$chatsender[] = $chats['sender_id']; 
		}
	}

	echo json_encode(array('chats'=>$allchats,'senders'=>$chatsender));

}


?>
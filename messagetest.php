<?php

//include db
require_once("db/dbaccess.php");


//insert data into the database

$senddata = mysqli_query($conn, "INSERT INTO messagetest(rec_id,message,sender_id,status) VALUES('1','you are such a sneaky sneaky person','4','unread')");
if($senddata)
	echo "Message sending successful";
else
	echo "Message Failed";

?>
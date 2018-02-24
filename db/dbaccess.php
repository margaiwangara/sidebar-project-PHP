<?php
$server = "localhost";
$username = "margai";
$password = "Washiali966564";
$dbname = "codepiphany";
$conn = mysqli_connect($server,$username,$password,$dbname);
if(!$conn)
	echo "Database Connection Failed";

function datascrub($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = @mysql_real_escape_string($data);



}


?>
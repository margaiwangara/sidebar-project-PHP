<?php

//include db
require_once("db/dbaccess.php");

//get all data from db
$getdate = mysqli_query($conn,"SELECT * FROM user_dob");
if(mysqli_num_rows($getdate) > 0)
{
	while($everydate = mysqli_fetch_assoc($getdate))
	{
		$dday[] = $everydate['dobday'];
		$dmonth[] = $everydate['dobmonth'];
		$dyear[] = $everydate['dobyear'];
	}
}

echo json_encode(array('day'=>$dday,'month'=>$dmonth,'year'=>$dyear));

?>
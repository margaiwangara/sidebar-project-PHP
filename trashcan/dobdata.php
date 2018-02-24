<?php

//include db
require_once("../db/dbaccess.php");

$thisyear = 1980;
for($i=0;$i<31;$i++)
{
	if($i>0 && $i<=50)
	{
		if($i<=12)
		{
			//insert into db
			$insertdate = mysqli_query($conn,"INSERT INTO user_dob(dobday,dobmonth,dobyear) VALUES('$i','$i','$thisyear'".+$i.")");
			$nextyear = $thisyear + $i;
			if($insertdate)
				echo "success all";
		}	
		if($i>12 && $i<=31)
		{
			$insertday = mysqli_query($conn,"INSERT INTO user_dob(dobday,dobyear) VALUES('$i','$i','$nextyear'".+$i.")");
			$finalyear = $nextyear + $i;
			if($insertdate)
				echo "Success day";
		}
		if($i>31 && $i <= 50)
		{
			//insert into db
			$insertdate2 = mysqli_query($conn,"INSERT INTO user_dob(dobyear) VALUES('$finalyear'".+$i.")");
			if($insertdate2)
				echo "Success year";
			else
				echo "Failed";
		}

	}
}


?>
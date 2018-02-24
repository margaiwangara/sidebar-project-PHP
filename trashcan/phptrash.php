<?php


$suggestions = mysqli_query($conn,"SELECT signuptest.name,signuptest.reg_id FROM signuptest INNER JOIN friends ON signuptest.reg_id != '$my_id' WHERE signuptest.reg_id != friends.rsender_id OR signuptest.reg_id != friends.r_receiver_id GROUP BY signuptest.name,signuptest.reg_id");



$suggestions = mysqli_query($conn,"SELECT * FROM signuptest INNER JOIN friends ON signuptest.reg_id = friends.rsender_id WHERE signuptest.reg_id = friends.r_receiver_id");
	if(mysqli_num_rows($suggestions) > 0)
	{
		$errormessage = 0;
		echo "<font color='red'>".mysqli_num_rows($suggestions)."</font>";
	}
	else
	{
		//get data from db from suggestions
		$getname = mysqli_query($conn, "SELECT * FROM signuptest WHERE reg_id != '$my_id' ORDER BY reg_id ASC");

		//check  if user is a newbie
		$user_guest = mysqli_query($conn,"SELECT * FROM signuptest WHERE reg_id = '$my_id' AND guest_rating = '1'");
		if(mysqli_num_rows($user_guest) > 0)
			$newbie = 1;

		if(mysqli_num_rows($getname) > 0)
		{
			while($namebasket = mysqli_fetch_assoc($query))
			{
				$names_id[] = $namebasket['reg_id'];
				$namebox[] = ucwords($namebasket['name']);
			}

			$errormessage = 1;
			echo json_encode(array('names'=>$namebox,'message'=>$errormessage,'is_newbie'=>$newbie,'names_id'=>$names_id));
		}
		else
		{
			$errormessage = 0;
		}
	}


	foreach($f_id as $value)
		{
			if($value != $user_id)
				$f_id_scrubbed[] = $value; 
		}
		foreach ($f_id2 as $value)
		{
			if($value != $user_id)
				$f_id2_scrubbed[] = $value;
		}


			//get data from the other db now
			$fscrub = mysqli_query($conn, "SELECT * FROM signuptest WHERE reg_id = '$f_id_scrubbed[$count]' OR reg_id = '$f_id2_scrubbed[$count]'");
			echo " Scrub: ".mysqli_num_rows($fscrub)." ";
			if(mysqli_num_rows($fscrub) > 0)
			{
				while($scrubdata = mysqli_fetch_assoc($fscrub))
				{
					$aday[] = $scrubdata['bday'];
					$amonth[] = $scrubdata['bmonth'];
					$ayear[] = $scrubdata['byear'];
					$fname[] = $scrubdata['name'];

					if($aday[$datacount] == $tday && $amonth[$datacount] == $tmonth)
					{
						$bfmessage[] = "Your friend <a href=''>".ucwords($fname[$datacount])."</a> has a birthday today. Ask him lots of questions about his life choices";
							
					}
						
				}
					
			}
				else
					$bferror = "No names here";

			$count++;$datacount++;$scount++;
		

?>
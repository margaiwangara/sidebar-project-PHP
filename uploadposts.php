<?php

//connect to db
require_once("db/dbaccess.php");

$userpost = @mysql_real_escape_string($_POST['user_posts']);
$userprivacy = @mysql_real_escape_string($_POST['post_privacy']);

function SwitchMonths($dobmonth)
{
	switch($dobmonth)
	{
		case 1:$dobmonth = "january";break;
		case 2:$dobmonth = "february";break;
		case 3:$dobmonth = "march";break;
		case 4:$dobmonth = "april";break;
		case 5:$dobmonth = "may";break;
		case 6:$dobmonth = "june";break;
		case 7:$dobmonth = "july";break;
		case 8:$dobmonth = "august";break;
		case 9:$dobmonth = "september";break;
		case 10:$dobmonth = "october";break;
		case 11:$dobmonth = "november";break;
		case 12:$dobmonth = "december";break;
		default:break;
	}
	return $dobmonth;
}

if(empty($userpost) && empty($userprivacy))
{
	echo $userpost." ".$userprivacy;
	echo "Data not input into textbox";
}
else
{
$sendposts = mysqli_query($conn,"INSERT INTO posts(user_id,post,privacy) VALUES('2','$userpost','$userprivacy')");
if(!$sendposts)
	echo "Data not inserted into database";
else
{
	$getposts = mysqli_query($conn, "SELECT posts.post,posts.privacy,posts.date,memberise.firstname,memberise.lastname FROM posts INNER JOIN memberise ON memberise.user_id = posts.user_id ORDER BY post_id DESC");
	if(mysqli_num_rows($getposts) > 0)
	{
		
		$arraypost = mysqli_fetch_assoc($getposts);
		$posts = $arraypost['post'];
		$privacy = $arraypost['privacy'];
		$post_date = $arraypost['date'];
		$firstname = $arraypost['firstname'];
		$lastname = $arraypost['lastname'];
		
		if(!empty($posts))
		{
			//explode date gotten from the database
			$explodedate = explode(" ", $post_date);
			$dateparts = explode("-", $explodedate[0]);

			//store each part in variable
			$day = $dateparts[2];
			$month = $dateparts[1];
			$year = $dateparts[0];
			$thistime = strtotime($explodedate[1]);
			$timefinal = date('h:i:sa',$thistime);

			//store the date and time value the way you want them to appear
			$postarrange = "<table><tr><th>".ucwords($firstname)." ".ucwords($lastname)."</th></tr><tr><td>".$posts."</td></tr><tr><td class='datetime'>Posted on ".$day." ".ucfirst(SwitchMonths($month))." ".$year." at ".$timefinal."</td></tr></table>";
				echo $postarrange;
		}
		else
		{
			$postarrange = "";
			echo "No posts yet";
		} 
				
			
		}
	}
}

?>
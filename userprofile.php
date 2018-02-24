<?php

//get database
require_once("db/dbaccess.php");

//set all variables to null
$username = $byear = $bday = $bmonth = $university = $college = $highschool = $primary = $work = $postarrange = "";
$imagepath = "images/avatar.png";
//get profile image
$getimage = mysqli_query($conn,"SELECT * FROM images WHERE owner_id = '2' ORDER BY img_id DESC");
if(mysqli_num_rows($getimage) > 0)
{
	$userimage = mysqli_fetch_assoc($getimage);
	$imagepath = $userimage['image'];
}
else
{
	$imagepath = "images/avatar.png";
}

$getinfo = "SELECT memberise.firstname,memberise.lastname,memberise.dobday,memberise.dobmonth,memberise.dobyear,user_info.college,user_info.university,user_info.highschool,user_info.primaryschool,user_info.work_info FROM user_info INNER JOIN memberise ON memberise.user_id = user_info.user_id";
$query = mysqli_query($conn,$getinfo);
if(mysqli_num_rows($query) > 0)
{
	$getdata = mysqli_fetch_assoc($query);
	$firstname = $getdata['firstname'];
	$lastname = $getdata['lastname'];
	$dobday = $getdata['dobday'];
	$dobmonth = $getdata['dobmonth'];
	$dobyear = $getdata['dobyear'];
	
	//check if the acquired data from the db are null
	if(empty($getdata['highschool']))
	{
		$highschool = "<i>Click here to add your high school info</i>";
	} 
	else
	{
		$highschool = $getdata['highschool'];
	}

	if(empty($getdata['college']))
	{
		$college = "<i>Click here to add your college info</i>";
	}
	else
	{
		$college = $getdata['college'];
	}
	if(empty($getdata['university']))
	{
		$university = "<i>Click here to add your university info</i>";
	}
	else
	{
		$university = $getdata['university'];
	}  
	if(empty($getdata['primaryschool']))
	{
		$primary = "<i>Click here to add your primary school info</i>";
	}
	else
	{
		$primary = $getdata['primaryschool'];
	} 
	if(empty($getdata['work_info']))
	{
		$work = "<i>Click here to add your work info</i>";

	}
	else
	{	
		$work = $getdata['work_info'];
	}

//change numerical months to string
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
	
$dobmonth = SwitchMonths($dobmonth);
	
}
else
{
	$university = "<i>Click here to add your university info</i>";
	$college = "<i>Click here to add your college info</i>";
	$highschool = "<i>Click here to add your high school info</i>";
	$primary = "<i>Click here to add your primary school info</i>";
	$work = "<i>Click here to add your work info</i>";
	$bmonth = "<i>Date of Birth</i>";
	$username = "<i>Name</i>";
}

/*
$getdate = mysqli_query($conn, "SELECT * FROM messages");
if(mysqli_num_rows($getdate))
{
	$dates = mysqli_fetch_assoc($getdate);
	$nowdate = $dates['msgtime'];

	$breaktime = explode(" ",$nowdate);
	$expldate = explode("-",$breaktime[0]);
	$expltime = explode(":",$breaktime[1]);

	echo "Raw Date: ".$nowdate."<br/>----------------------<br/>";
	echo "Year: ".$expldate[0]."<br/>";
	echo "Month: ".$expldate[1]."<br/>";
	echo "Day: ".$expldate[2]."<br/>-----------------------<br/>";
	echo "Hour: ".$expltime[0]."<br/>";
	echo "Minute: ".$expltime[1]."<br/>";
	echo "Second: ".$expltime[2]."<br/>--------------------<br/>";
	echo "Date: ".$breaktime[0]."<br/>";
	echo "Time: ".$breaktime[1];
}
*/
	$getposts = mysqli_query($conn, "SELECT posts.post,posts.privacy,posts.date FROM posts INNER JOIN memberise ON memberise.user_id = posts.user_id ORDER BY post_id DESC");
	if(mysqli_num_rows($getposts) > 0)
	{
		$count = 0;
		while($arraypost = mysqli_fetch_assoc($getposts))
		{
			$posts[] = $arraypost['post'];
			$privacy[] = $arraypost['privacy'];
			$post_date[] = $arraypost['date'];

			if(!empty($posts[$count]))
			{
				
				//store the date and time value the way you want them to appear
				//$postarrange[] = "<table><tr><th>".ucwords($firstname)." ".ucwords($lastname)."</th></tr><tr><td>".$posts[$count]."</td></tr><tr><td class='datetime'>Posted on ".$day." ".ucfirst(SwitchMonths($month))." ".$year." at ".$timefinal."</td></tr></table>";
				
				$count++;
				
			}
			else 
				$postarrange = "";
			
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		#infobox
		{
			position: absolute;
			height: 80%;width: 75%;
			top: 5%;border-radius: 5px;
			border: solid brown 2px;
			left: 15%;
			overflow-y: auto;
		}
		.infoheader
		{
			position: absolute;
			height: 8%;width: 99.3%;
			border-radius: 5px;
			margin-left: -1px;
			font-weight: bold;
			font-family: berkshire swash;
			font-size: 25px;color: green;
			padding-left: 5px;
		}
		.personalinfo
		{
			position: absolute;
			height: 80%;width: 40%;
			border-radius: 5px;
			border: solid black 2px;
			top: 10%;
		}
		
		.personalinfo table
		{
			font-family: calibri;
			line-height: 15px;
			padding-left: 3px;
		}
		a
		{
			text-decoration: none;
			color: brown;
		}
		.personalinfo img
		{
			height: 20px;width: 20px;
			float: right;cursor: pointer;
			padding: 2px;
		}
		.userthoughts
		{
			border: solid black 2px;
			position: absolute;
			top: 10%;right: 2%;
			width: 55%;height: 100%;
			border-radius: 5px;
			border-bottom: none;
		}
		#postsinput
		{
			resize: none;
			font-family: calibri;
			font-size: 15px;
		}
		.userthoughts table
		{
			position: absolute;
			top: 2%;left: 3%;
		}
		#tblprivacy
		{
			position: absolute;
			top: 23%;left: 3%;
		}
		#modal_bg
		{
			position: fixed;
			height: 100%;width: 100%;
			opacity: .6;background: black;
			z-index: 1;
			margin: -8px 0px 0px -8px;
			display: none;
		}
		#profile_modal
		{
			position: absolute;
			top: 10%;left: 30%;
			height: 85%;width: 35%;
			z-index: 1;background: white;
			border-radius: 5px;
			display: none;
		}
		.modal_inside
		{
			height: 95%;width: 90%;
			position: absolute;
			border: solid black 2px;
			border-radius: 5px;
			left: 4.5%;top: 2%;
		}
		#birthdayinfo_tb td
		{
			width: 50%;
			border-radius: 5px;
		}
		.modal_inside
		{
			font-family: calibri;
		}
		input[type="text"]
		{
			border-radius: 5px;
			border: solid grey thin;
			padding-left: 3px;
		}
		#user_message
		{
			display: none;
		}
		.profile_image
		{
			border: groove grey 2px;
			position: absolute;
			height: 25%;width: 25%;
			right: 7%;top: 1px;
		}
		.profile_image img
		{
			height: 100%;width: 100%;
			object-fit: cover;
			margin: -2px -2px 0px 0px;
		}
		#ajaxplace table
		{
			top: 30%;
			border: solid black thin;
			width: 90%;height: 10%;
			left: 4%;text-align: left;
			font-family: calibri;
		}
		#ajaxplace table th
		{
			color:brown;
			cursor: pointer;
			font-family: cambria;
		}
		#postsdisplay table
		{
			top: 30%;
			width: 90%;height: 10%;
			left: 4%;text-align: left;
			font-family: calibri;
		}
		#postsdisplay table th
		{
			color:brown;
			cursor: pointer;
			font-family: cambria;
		}
		.datetime
		{
			font-size: 12px;
		}

	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script type="text/javascript">
	$(document).ready(function()
	{
		$("a , #user_settings").on('click',function(e)
		{
			e.preventDefault();
			$("#modal_bg").fadeIn(700);
			$("#profile_modal").slideDown(1000);
		});
		$("#close_modal, #modal_bg").on('click', function()
		{
			$("#modal_bg").fadeOut(1000);
			$("#profile_modal").slideToggle(700);
		});

		$("#choice_cancel").on('click', function(e)
		{
			e.preventDefault();
			$("#modal_bg").fadeOut(1000);
			$("#profile_modal").slideToggle(700);
		});
		$("#choice_update").on('click', function(e)
		{
			
			e.preventDefault();
			$.ajax({
				url:"profile_update.php",
				type:"POST",

				dataType:"html",
				data:$("#profile_form").serialize(),
				cache:false,

				success:function(data){
				
				var time = 0;
				do
				{
					$("#user_message").css({'color':'green','font-size':'13px;','font-family':'calibri'});
					$("#user_message").css("color","green");
					$("#user_message").html("Updating...").fadeIn();
					$("#user_message").fadeOut();
					time+=1000;

				}while(time < 5000);
				setTimeout(function()
				{
						$("#user_message").css({'color':'green','font-size':'13px;','font-family':'calibri'});
						$("#user_message").html("Update Completed").fadeIn();
				},time)
					
				}

			});
		});

	});
		
	</script>
	<script type="text/javascript">
		$(document).ready(function()
		{

			$("#submitpost").on('click',function(e)
			{
				e.preventDefault();
				if($("#postsinput").val() == "")
				{
					$(".errormessage").css({"font-family":"cambria"});
					$(".errormessage").html("<font color='red'>Empty textarea</font>").fadeIn();
					$(".errormessage").html("<font color='red'>Empty textarea</font>").fadeOut(5000);
				}
				else{
				$.ajax({
					url:"uploadposts.php",
					type:"POST",

					dataType:"html",
					data:$("form#formposts").serialize(),
					//cache:false,
					success:function(data){
						$("#postsdisplay").append(data);
						//alert(data);
					}
				});
			}
			});
		});
	</script>
</head>
<body>

<div id="modal_bg"></div>
<div id="profile_modal">
	<img src="images/closemodal.png" alt="closemodal" width="18" height="18" style="float: right;cursor: pointer;" id="close_modal" />
	
	<div class="modal_inside">
		
	<form id="profile_form" action="" method="post">
		<table id="userinfo_tb">
			<tr>
				<th style="color:green;font-family: berkshire swash;font-size: 18px;text-align: left;">Personal Info</th>
			</tr>
			<tr>
				<td>Name</td>
				<td>Surname</td>
			</tr>
			<tr>
				<td><input type="text" name="firstname" placeholder="Firstname" id="fname" value="<?php echo ucwords($firstname);?>"/></td>
				<td><input type="text" name="lastname" placeholder="Lastname" id="lname" value="<?php echo ucwords($lastname);?>"/></td>
			</tr>
			<tr>
				<td>Date of Birth</td>
			</tr>
		</table>
		<table id="birthdayinfo_tb" style="width: 10%;">
			<tr>
				<td><input type="text" name="dobday" placeholder="Day" id="birthday" size="10" value="<?php echo $dobday;?>" /></td>
				<td><input type="text" name="dobmonth" placeholder="Month" id="birthmonth" size="11" value="<?php echo ucfirst($dobmonth);?>"/></td>
				<td><input type="text" name="dobyear" placeholder="Year" id="birthyear" size="13" value="<?php echo $dobyear;?>"/></td>
			</tr>
		</table>
		<hr/>
		<table id="edu_info">
			<tr>
				<th style="color:green;font-family: berkshire swash;font-size: 18px;text-align: left;">Education</th>
			</tr>
			<tr>
				<td>University</td>
			</tr>
			<tr>
				<td><input type="text" name="university" placeholder="University" id="user_uni" size="45" value="<?php if(!empty($getdata['university']))echo ucfirst($university);?>"/></td>
			</tr>
			<tr>
				<td>College</td>
			</tr>
			<tr>
				<td><input type="text" name="college" placeholder="College" id="user_college" size="45" value="<?php if(!empty($getdata['college']))
					echo ucfirst($college);?>"/></td>
			</tr>
			<tr>
				<td>High School</td>
			</tr>
			<tr> 
				<td><input type="text" name="hschool" placeholder="High School" id="user_hschool" size="45" value="<?php if(!empty($getdata['highschool'])) 
				echo ucfirst($highschool);?>"/></td>
			</tr>
			<tr>
				<td>Primary</td>
			</tr>
			<tr>
				<td><input type="text" name="primary" placeholder="Primary" id="user_primary" size="45" value="<?php if(!empty($getdata['primaryschool'])) 
				echo ucfirst($primary);?>"/></td>
			</tr>
		</table>
		<hr/>
		<table id="work_info">
			<tr>
				<th style="color:green;font-family: berkshire swash;font-size: 18px;text-align: left;">Work Info</th>
			</tr>
			<tr>
				<td>Work</td>
			</tr>
			<tr>
				<td><input type="text" name="work" placeholder="Work/Business" id="user_work" size="45" value="<?php if(!empty($getdata['work_info'])) echo $work;?>"/></td>
			</tr>
		</table>
		<table id="user_choice">
			<tr>
				<td><button id="choice_update">Update</button></td>
				<td><button id="choice_cancel">Cancel</button></td>
				<td><span id="user_message">Blinder goes here</span></td>
			</tr>
		</table>
	</form>
	</div>
</div>
<div id="infobox">
	<div class="infoheader">User Profile</div>
	<hr style="top: 5%;position: absolute;width: 100%;" color="brown" />
	<div class="personalinfo">
		<table id="tablepinfo">
			<div class="profile_image"><img src="<?php echo $imagepath;?>" alt="ProfImg001"/></div>
			<img src="images/settingsimple.png" alt="settings" title="Settings" id="user_settings" />
			<tr>
				<th style="font-family: berkshire swash;color: green;font-size: 20px;width: 30%;">Personal Info</th>
			</tr>
			<tr>
				<td><b>Name</b></td>
			</tr>
			<tr>
				<td><a href=""><?php echo ucfirst($firstname)." ".ucfirst($lastname);?></a></td>
			</tr>
			<tr>
				<td><b>Date of Birth</b></td>
			</tr>
			<tr>
				<td><a href=""><?php echo $dobday." ".ucfirst($dobmonth)." ".$dobyear; ?></a></td>
			</tr>
		</table>
		<hr/>
		<table>
			<tr>
				<th style="font-family: berkshire swash;color: green;font-size: 20px;width: 30%;">Education Info</th>
			</tr>
			<tr>
				<td><b>University</b></td>
			</tr>
			<tr>
				<td><a href=""><?php echo $university;?></a></td>
			</tr>
			<tr>
				<td><b>College</b></td>
			</tr>
			<tr>
				<td><a href=""><?php echo $college;?></a></td>
			</tr>
			<tr>
				<td><b>High School</b></td>
			</tr>
			<tr>
				<td><a href=""><?php echo $highschool;?></a></td>
			</tr>
			<tr>
				<td><b>Primary School</b></td>
			</tr>
			<tr>
				<td><a href=""><?php echo $primary;?></a></td>
			</tr>
		</table>
		<hr/>
		<table>
			<tr>
				<th style="font-family: berkshire swash;color: green;font-size: 20px;width: 30%;">Work Info</th>
			</tr>
			<tr>
				<td><b>Work/Business</b></td>
			</tr>
			<tr>
				<td><a href=""><?php echo $work;?></a></td>
			</tr>
			
		</table>
	</div>
	<div class="userthoughts" style="overflow-y: auto;">
		<form id="formposts" action="uploadposts.php" method="post">
		<table id="tableposts">
			<tr>
				<td><textarea rows="5" cols="80" name="user_posts" id="postsinput" ></textarea></td>
			</tr>
		</table>
		<table id="tblprivacy">
			<tr>
				<td><button id="submitpost">Post</button></td>
				<td>
					<select name ="post_privacy" id="userprivacy" >
						<option value="public">Everyone</option>
						<option value="friends">Friends</option>
						<option value="private">Only Me</option>
					</select>
				</td>
				<td><span class="errormessage"></span>
			</tr>
			
		</table>
		</form>
		<div id="postsdisplay">
		<table>
			<?php 
				if(!empty($posts))
				{
					
				for($i=0;$i<count($posts);$i++)
				{
					//explode date gotten from the database
					$explodedate = explode(" ", $post_date[$i]);
					$dateparts = explode("-", $explodedate[0]);

					//store each part in variable
					$day = $dateparts[2];
					$month = $dateparts[1];
					$year = $dateparts[0];
					$thistime = strtotime($explodedate[1]);
					$timefinal = date('h:i:sa',$thistime);
					
					echo "<tr><th>".ucwords($firstname)." ".ucwords($lastname)."</th></tr><tr><td>".$posts[$i]."</td></tr><tr><td class='datetime'>Posted on ".$day." ".ucfirst(SwitchMonths($month))." ".$year." at ".$timefinal."</td></tr>";

					reset($explodedate);
					reset($dateparts);
				}
					/*
					for($i=0;$i<count($postarrange);$i++) 
					echo $postarrange[$i]."<br/>";//echo $postarrange;
					*/
				}
				
			?>
		</table>
		</div>
	</div>
</div>

</body>
</html>
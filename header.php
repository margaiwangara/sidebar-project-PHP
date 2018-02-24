<?php

//start session
session_start();

$usersalute = $links = "";
	if(!empty($_SESSION['user_id']) || !empty($_SESSION['email']))
	{
		//assign variables from the session values for easy manipulation
		$username = $_SESSION['name'];
		$usersalute = "Welcome ".$username;
		$links = " | <a href='home.php' id='homelink'>Home</a> | <a id='friends_display' href=''>Find Friends</a> | <a href='notifications.php' id='notifylink'>Notifications</a> | <a href='userinfo.php' id='proflink'>Profile</a> | <a href='messageinterface.php'>Messages</a> | <a href='randomchats.php' id='rndchats.php'>Chat Room</a> | <a href='signout.php' id='signoutlink'>Sign Out</a>";
	}
	else
		$usersalute = "Welcome Guest | <a href='login_form.php'>Login</a> | <a href='signup.php'>Sign Up</a>";


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/headerstyle.css"/>
	<link rel="stylesheet" type="text/css" href="styles/style.css"/>
	<link rel="stylesheet" type="text/css" href="styles/notifications.css"/>
	<link rel="stylesheet" type="text/css" href="styles/profile.css"/>
	<link rel="stylesheet" type="text/css" href="styles/messages.css"/>
		<link rel="stylesheet" type="text/css" href="styles/chatbox.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/profile.js"></script>
	<script type="text/javascript" src="js/homepage.js"></script>
	<script type="text/javascript" src="js/imageprocess.js"></script>
	<script type="text/javascript" src="js/notifications.js"></script>
	<script type="text/javascript" src="js/messages.js"></script>
	<script type="text/javascript" src="js/chatbox.js"></script>
</head>
<body>
<header>
	<div class="links">
		<div class="profimage"><img src="images/avatar.png" alt="UserProf001"/></div>
		<?php echo $usersalute;echo "<font style='float: right;'>".$links."</font>";?>	
	</div>
</header>
<div id="modalbg"></div>
<div id="friend_suggest_box">
	<img src="images/closemodal.png" height="20" width="20" alt="closeModal" align="right" style="cursor: pointer;" id="closemodal_img"/>
	<div class="welcome_message">FaceOffers</div>
	<div class="friend_legend">Here are a few friend suggestions for you</div>
	<div class="suggest_display">
		<form action="" method="post" id="friend_suggests">
			<table id="friend_suggest_table">


			</table>
			<!--suggestions table goes here-->
		</form>
	</div>
</div>
<div id="profileimage">
	<img src="images/closemodal.png" height="20" width="20" alt="closeModal" align="right" style="cursor: pointer;" id="closemodal_img"/>
	<div class="errorbox"></div>
	<div class="image_legend">Profile Image Upload</div>
	<div class="image_shell">
		<div class="image_habitat"><img src="images/avatar.png" alt="ProfileImage001"/></div>
		<div class="image_choice">
			<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
				<table id="upldimg_table">
					<tr>
						<td>
							<label id="img_from_file" style="cursor: pointer;">Upload From File<input type="file" id="image_id" name="userimage"/></label>
							<div class="loadbar_shell"><div class="loadbar"></div></div><div class="loadbar_counter"></div>
						</td>
						<td id="testloader">Upload From Google Drive</td>
					</tr>
					<tr>
						<td>Choose From Albums</td>
						<td>Upload From Url</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>

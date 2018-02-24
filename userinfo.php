<?php

//include header
require_once("header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		#listdisplay
		{
			position: fixed;height: 70%;
			width: 35%;top: 13%;left: 30%;
			box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
			background: white;z-index: 1;
			overflow-y: auto;display: none;
		}
		.imagehold img
		{
			height: 100%;width: 100%;
			cursor: pointer;
			object-fit: cover;
		}
		.imagehold
		{
			height: 11%;width: 15%;
			border: solid black thin;
			top: 1%;left: 1%;position: absolute;
		}
		.listcontainer table
		{
			position: absolute;left: 17%;
			border: solid black thin;top: 1%;
			width: 82%;font-family: cambria;
			text-align: left;

		}
		.listcontainer
		{
			border: solid black 2px;
			height: 95%;width: 95%;
			position: absolute;
			top: 2.5%;left: 2.5%;
			overflow-y: auto;
		}
		#informationupdate
		{
			position: fixed;height: 70%;
			width: 60%;top: 13%;left: 20%;
			box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
			background: white;z-index: 1;
			overflow-y: auto;display: none;
		}
		.controlbox
		{
			height: 95%;width: 30%;
			left: 2%;top: 2.5%;
			border: solid black 2px;
			position: absolute;
			font-family: cambria;
		}
		#cntrlstbl td
		{
			border-bottom: dotted grey 2px;
			cursor: pointer;
		}
	</style>
</head>
<body>
<div id="listdisplay">
	<img src="images/closemodal.png" height="15" width="15" alt="closeModal" align="right" style="cursor: pointer;" id="closemodal_img"/>
	<div class="listcontainer">	
		<table id="listtbl">

			
		</table>
	</div>
</div>
<div id="informationupdate">
	<div class="controlbox">
		<table id="cntrlstbl" cellspacing="3" style="width: 100%;">
			<tr>
				<td id="prsinfo">Personal Info</td>
			</tr>
			<tr>
				<td id="eduinfo">Education Info</td>
			</tr>
			<tr>
				<td id="workinfo">Work Info</td>
			</tr>
			<tr>
				<td id="accntinfo">Account Info</td>
			</tr>
		</table>
	</div>
	<div class="personalupdate"></div>
	<div class="educationupdate"></div>
	<div class="workupdate"></div>
</div>
<div id="imagearea">
	<div class="profileimage" style="cursor: pointer;">
		<img src="images/avatar.png" alt="userProfile001"/>
		<div class="imageupload">
			<table id="imagechange">
				<tr>
					<td style="border-right: solid white 2px;" id="imgupload">Upload</td>
					<td id="imgdelete">Delete</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="username_display"></div>
</div>
<div id="infoarea">
	<div class="userinfo">
		<table id="userinfo_tbl" cellspacing="2">
			<tr>
				<th style="color:brown;font-size: 17px;text-align: center;border-bottom: dotted grey 2px;">Personal Info</th>
			</tr>
			<tr>
				<th>Name</th>
			</tr>
			<tr>
				<td class='namebox'>Personal Info</td>
			</tr>
			<tr>
				<th>Date of Birth</th>
			</tr>
			<tr>
				<td class='dobbox'>Personal Info</td>
			</tr>
			<tr>
				<th>E-Mail</th>
			</tr>
			<tr>
				<td class='emailbox'>Personal Info</td>
			</tr>
		</table>
		<table id="useredu_tbl" cellspacing="2">
			<tr>
				<th style="color:brown;font-size: 17px;text-align: center;border-bottom: dotted grey 2px;border-top: dotted grey 2px;">Education</th>
			</tr>
			<tr>
				<th>University</th>
			</tr>
			<tr>
				<td class='unibox'>Education</td>
			</tr>
			<tr>
				<th>College</th>
			</tr>
			<tr>
				<td class='collebox'>Education</td>
			</tr>
			<tr>
				<th>High School</th>
			</tr>
			<tr>
				<td class='hsbox'>Education</td>
			</tr>
			<tr>
				<th>Primary</th>
			</tr>
			<tr>
				<td class='primobox'>Education</td>
			</tr>
		</table>
		<table id="userwork_tbl" cellspacing="2">
			<tr>
				<th style="color:brown;font-size: 17px;text-align: center;border-bottom: dotted grey 2px;border-top: dotted grey 2px;">Work Info</th>
			</tr>
			<tr>
				<th>Occupation</th>
			</tr>
			<tr>
				<td class="workbox">Work Info</td>
			</tr>
		</table>
		<table id="userother_tbl" cellspacing="2">
			<tr>
				<th style="color:brown; font-size: 17px;text-align: center;border-bottom: dotted grey 2px;border-top: dotted grey 2px;">Hobbies</th>
			</tr>
			<tr>
				<td  class="hobbybox">Other</td>
			</tr>
			<tr>
				<th style="color:brown;font-size: 17px;text-align: center;border-bottom: dotted grey 2px;border-top: dotted grey 2px;">Likes</th>
			</tr>
			<tr>
				<td  class="likebox">Other</td>
			</tr>
			<tr>
				<td><span id="showfriends" style="color: black;cursor: pointer;">Friends</span></td>
			</tr>
		</table>
	</div>
	<div class="postsarea">
		<form id="formposts" action="" method="post">
		<table id="tableposts">
			<tr>
				<td><textarea rows="5" cols="75" name="user_posts" id="postsinput" ></textarea></td>
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
				<td><span class="errormessage"></span></td>
			</tr>
			
		</table>
		</form>
		<table id="postdisplay">
			<tr>
				<th>Sample test header</th>
			</tr>
			<tr>
				<td>This is a sample test code</td>
			</tr>
		</table>
	</div>

</body>
</html>
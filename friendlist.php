<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title>Friendlist</title>
	<style type="text/css">
		#listdisplay
		{
			position: absolute;height: 70%;
			width: 35%;top: 10%;left: 30%;
			box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
		}
		.imagehold img
		{
			height: 100%;width: 100%;
			cursor: pointer;
			object-fit: cover;
		}
		.imagehold
		{
			height: 13%;width: 15%;
			border: solid black thin;
			top: 1%;left: 1%;position: absolute;
		}
		#listtbl
		{
			position: absolute;left: 17%;
			border: solid black thin;top: 1%;
			width: 82%;font-family: cambria;
			text-align: left;

		}
	</style>
</head>
<body>
<div id="listdisplay">
	<div class="listcontainer">
		<div class="imagehold"><img src="images/testsubone.jpg" alt="ImgFriend001"/></div>
		<table id="listtbl">
			<tr>
				<th>Salma Halima Wangara</th>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td style="float: right;"><button id="friessagebtn">Message</button></td>
			</tr>
		</table>
	</div>
</div>
</body>
</html>
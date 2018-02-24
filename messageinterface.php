<?php


//require header
require_once("header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>
</head>
<body>
<div id="mainarea">
	<div class="serecarea">
		<table id="statusbox">
			<tr>
				<td style="border-right: solid brown 2px;width: 20%;">Unread</td>
				<td style="border-right: solid brown 2px;width: 20%;">All</td>
				<td><input type="text" name="searchmsg" id="msgsearch" placeholder="Search" /></td>
			</tr>
		</table>
		<table id="incomings" style="font-family: cambria;text-align: left;width: 100%;cursor: pointer;top: 15%;position: absolute;">
			<tr>
				<th>AbdulKarim Margai Wangara</th>
			</tr>
			<tr>
				<td style="border-bottom: dotted grey 2px;">It has been a very forgiving day for us all</td>
			</tr>
			<tr>
				<th>AbdulKarim Margai Wangara</th>
			</tr>
			<tr>
				<td style="border-bottom: dotted grey 2px;">It has been a very forgiving day for us all</td>
			</tr>

		</table>
	</div>
	<div class="msgdisplay">
		<form id="sendmsg" action="" method="post">
			<table id="txtarea" style="width: 100%;left: 5%;top: 3%;position: absolute;">
				<tr>
					<td><input type="email" name="rec_email" placeholder="To @Who.com?" id="email_rec" autocomplete="off" value=""  /></td>
				</tr>
				<tr>
					<td><textarea rows="5" cols="58" name="message" id="msg_txtarea"></textarea></td>
				</tr>
			</table>
			<table id="tbl_send" style="top: 30%;left:5%;position: absolute;">
			<tr>
				<td><button id="submitmsg" name="msgsubmit">Send</button></td>
				<td><span class="error_pri"></span></td>
			</tr>
		</table>
		</form>
		<table id="display" style="position: absolute;top: 37%;left: 5%;font-family: cambria;text-align: left;">
			<tr>
				<th>Sender's name here</th>
			</tr>
			<tr>
				<td>This is a sample test subject</td>
			</tr>
		</table>
	</div>
</div>

</body>
</html>
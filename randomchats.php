<?php

require_once("header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat Room</title>
</head>
<body>
<div id="chatarea">
	<div class="mess_display">
		<table id="mess_tbl" style="position: absolute;bottom: 0;overflow-y: auto;">

		</table>
	</div>
	<div class="userinput">
	<form id="sendmess_form" action="" method="post">
		<table id="userinput_tbl" style="width: 100%;">
			<tr>
				<td><input type="text" autocomplete="off" name="usermessage" id="usermessage_id" placeholder="Type message here..." size="45" /></td>
				<td><button id="send_btn">Send</button></td>
			</tr>
		</table>
	</form>
	</div>
</div>

</body>
</html>
<?php

require_once("header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Notifications</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<body>
<div id="acceptrequest">
	<img src="images/closemodal.png" height="20" width="20" alt="closeModal" style="cursor: pointer;right: 2%;top: 2%;position: absolute;z-index: 1;" id="closemodal_img"/>
	<div class="border-style">
		<form id="frm_respond">
			<table id="tbl_respond">
				<tr>
					<th>Respond To Request</th>
				</tr>
				<tr>
					<td class="friend_mes">Your friend YY sent you a request</td>
				</tr>
				<tr>
					<td style="padding-top: 5px;"><button id="btn_accept" style="margin-right: 5px;cursor: pointer;">Accept</button><button style="cursor: pointer;" id="btn_delete">Delete Request</button>
				</tr>
			</table>
		</form>
	</div>
</div>
<div id="not_display">
	<div class="not_legend">Notifications</div>
	<table id="not_content">
		
	</table>
</div>

</body>
</html>
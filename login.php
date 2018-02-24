<?php

?>


<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("form#loginform").on('submit',function(e)
		{
			e.preventDefault();
		if($("#emailaccess").val() == "" || $("#passaccess").val() == "")
			$(".displaymess").html("<font color='red'>Input all fields</font>");
		else
		{
			$.post( "accessaccnt.php",
			$("#loginform").serialize(),
			function(data)
			{
				$(".displaymess").html(data);
			});
			/*
			$.ajax({
				url: "accessaccnt.php",
				type: "POST",

				dataType: "html",
				data: $("#loginform").serialize(),
				
				success:function(data){
					$(".displaymess").html(data);
				}
			});
			*/
		}
		});
	});
		
	</script>
</head>
<body>
<div id="loginsurface">
	<form id="loginform" action="accessaccnt.php" method="POST">
		<table id="logintable">
			<tr>
				<td>Email</td>
				<td><input type="email" placeholder="Email" name="loginemail" id="emailaccess"/> </td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" placeholder="Password" name="loginpass" id="passaccess"/> </td>
			</tr>
			<tr>
				<td><button id="loginsubmit">Log In</button></td>
				<td><span class ="displaymess">Message goes here!</span></td>
			</tr>
		</table>
	</form>
	
</div>
</body>
</html>
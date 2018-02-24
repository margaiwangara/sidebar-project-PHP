<?php

?>


<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<style type="text/css">
		a
		{
			text-decoration: none;
			font-family: calibri;
			color: brown;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#btnlogin").on('click',function(e)
			{
				e.preventDefault();
				$("#usercomms").css({'font-family':'cambria'});
				$("a").css({'text-decoration':'none','color':'green'});
				if($("#login_email").val() == "" && $("#login_pass").val() == "")
					$("#usercomms").html("<font color='red'>All fields must be filled</font>");
				else
				{
					$.ajax({
						url:"login_php.php",
						type:"POST",

						dataType:"json",
						data:$("#loginform").serialize(),
						cache:false,
						success:function(info)
						{
							var data = info.message;
							if(data == 1)
							{
								$("#usercomms").html("<font color='green'>Redirecting...</font>").fadeIn(300);
								$("#usercomms").fadeOut(300);
								Redirect();

							}
							else
								$("#usercomms").html(data);
							
						}
					})
				}
			});

			function Redirect()
			{
				var interval = setInterval(redirect,70);

				function redirect()
				{
					window.location.replace("home.php");
					clearInterval(interval);
				}
			}
		});
	</script>
</head>
<body>
<form id="loginform">
	<table id="logintable">
		<tr>
			<td>Email</td>
			<td><input type="email" name="loginemail" id="login_email" autofocus="autofocus" autocomplete="off" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="loginpass" id="login_pass" autocomplete="off" /></td>
		</tr>
		<tr>
			<td><button id="btnlogin">Log In</button></td>
			<td><a href="signup.php">Sign Up</a></td>
		</tr>
	</table>
	<table>
		<tr>
			<td><span id="usercomms"></span></td>
		</tr>
	</table>
</form>

</body>
</html>
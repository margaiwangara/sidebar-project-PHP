<?php

//start session
session_start();

$usersalute = $logout = "";
	if(!empty($_SESSION['user_id']) || !empty($_SESSION['email']))
	{
		//assign variables from the session values for easy manipulation
		$username = $_SESSION['name'];
		$usersalute = "Welcome ".$username;
		$logout = " | Logout";
	}
	else
		$usersalute = "Welcome Guest | <a href='login_forn.php'>Login</a> | <a href='signup.php'>Sign Up</a>";
	
?>



<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>
	<style type="text/css">
		#messagebox
		{
			border: solid black 2px;
			top: 10%;left: 15%;
			height: 60%;width: 70%;
			position: absolute;
			border-radius: 5px;
			overflow-y: auto;
		}
		.sendmessage
		{
			position: absolute;
			top: 2px;height: 42%;
			width: 60%;
			border: solid black 2px;
			right: 2px;border-radius: 5px;
		}
		.seesender
		{
			position: absolute;
			top: 2px;height: 100%;
			width: 38%;
			border: solid black 2px;
			left: 2px;border-radius: 5px;
			overflow-y: auto;
		}
		.seemessage
		{
			position: absolute;
			top: 45%;height: 100%;
			width: 60%;
			border: solid black 2px;
			right: 2px;border-radius: 5px;
			overflow-y: auto;
		}
		.sendmessage table
		{
			padding: 5px;
			text-align: left;
		}
		.saluteuser
		{
			color:brown;
			font-family:cambria;
			position: absolute;top: 5%;
			left: 15%;
		}
		a
		{
			text-decoration: none;
			color:brown;
			font-family: cambria;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#btnsendmsg").on('click',function(e)
			{
				e.preventDefault();
				$("#msgerror").css({'font-family':'cambria'});
				if($("#rec_email").val() == "" || $("#msgtxtarea").val() == "")
					$("#msgerror").html("<font color='red'>All fields must be filled</font>");
				else
				{
					$.ajax({
						url:"sendmessage.php",
						type:"POST",

						dataType:"json",
						data:$("#msgsendform").serialize(),
						cache:false,
						success:function(hello)
						{
							$("#rec_email").val("");
							$("#msgtxtarea").val("");

							$("#msgerror").html(hello.msgupdate).fadeIn(1000);
							$("#msgerror").fadeOut(3000);
									
						}
					})
				}

			})
		});
	</script>
	<script type="text/javascript">
	$(document).ready(function()
	{
		$.ajax({
			url:"getmessages.php",
			type:"POST",

			dataType:"json",
			data:"",
			success:function(result)
			{
				//alert(result.messages);
				$(".msgsdisplay").html("<tr><td>"+result.sender_id+"</td></tr><tr><td>"+result.messages+"</td></tr>");

			}
		});
	});

	</script>
</head>
<body>
<div class="saluteuser"><?php echo $usersalute."<a href='signout.php'> ".$logout."</a>";?></div>
<div id="messagebox">
	<div class="sendmessage">
		<form id="msgsendform">
		<table>
			<tr>
				<td><input type="email" name="rec_id" id="rec_email" autocomplete="off"/></td>
			</tr>
			<tr>
				<td><textarea name="messagearea" rows="5" cols="60" id="msgtxtarea" style="resize: none;"></textarea></td>
			</tr>
		</table>
		<table style="margin-top: -10px;">
			<tr>
				<td width="10"><button id="btnsendmsg">Send</button></td>
				<td><span id="msgerror"></span></td>
			</tr>
		</table>
		</form>
	</div>
	<div class="seemessage">
		<table>
			<div class="msgsdisplay"></div>
		</table>
	</div>
	<div class="seesender"></div>
</div>

</body>
</html>
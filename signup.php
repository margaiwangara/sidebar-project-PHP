<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
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
			$("#signupsubmit").on('click',function(e)
			{
				e.preventDefault();
				var tmonth = $("#dmonth").val(); 
				var tyear = $("#dyear").val();
				var tday = $("#dday").val();


				$("#usermessage").css({'font-family':'cambria'});
				if($("#user_name").val() == "" && $("#user_email").val() == "" && $("#user_pass").val() == "")
					$("#usermessage").html("<font color='red'>All fields must be filled</font>");
				else if(tmonth == 2 && tday > 29)
					$("#usermessage").html("<font color='red'>February has a maximum of 29 days</font>");
				else if(tmonth == 2 && (tyear%4) != 0 && tday > 28)
					$("#usermessage").html("<font color='red'>Not a leap year</font>");
				else if((tmonth == 4 || tmonth == 6 || tmonth == 9 || tmonth == 11) && tday > 30)
					$("#usermessage").html("<font color='red'>Month has a maximum of 30 days</font>");
				else
				{					
					$.ajax({
					url:"signup_php.php",
					type:"POST",

					dataType:"html",
					data:$("#signupform").serialize(),
					cache:false,
					success:function(data)
					{
						if(data == 1)
						{
							$("#usermessage").html("<font color='green'>Redirecting...</font>").fadeIn(300);
							$("#usermessage").fadeOut(300);
							Redirect();
						}
						else
							$("#usermessage").html(data);	

					}

					});
					$("#signupform")[0].reset();
				}
				});

			function Redirect()
			{
				var interval = setInterval(redirect,100);

				function redirect()
				{
					window.location.replace("home.php");
					clearInterval(interval);
				}
			}
			
		$(document).ready(function()
		{
			$.ajax({
				url:"dobdata.php",
				type:"POST",

				dataType:"json",
				data:"",
				success:function(data)
				{
					var day = data.day;
					var month = data.month;
					var year = data.year;

					var dayholder,yearholder,monthholder;
					dayholder = "<select id='dday'>";
					yearholder = "<select id='dyear'>";
					monthholder = "<select id='dmonth'>";

					//set select for day
					day.forEach(function(value,key)
					{
						if(key < 31)
							dayholder += "<option value='"+value+"'>"+value+"</option>";
					});

					month.forEach(function(value,key)
					{
						if(key < 12)
							monthholder += "<option value='"+value+"'>"+value+"</option>";
					});

					year.forEach(function(value,key)
					{
						yearholder += "<option value='"+value+"'>"+value+"</option>";

					});

					//close the dropdown
					dayholder += "</select>";
					yearholder += "</select>";
					monthholder += "</select>";

					$("#dobplace").html(dayholder+" "+monthholder+" "+yearholder);
				}
			});	
		});
		});
	</script>
</head>
<body>

<form id="signupform" action="" method="post">
	<table id="signuptable">
		<tr>
			<td>Name</td>
			<td><input type="text" name="username" id="user_name" autofocus="autofocus" autocomplete="off" placeholder="Name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="useremail" id="user_email" autocomplete="off" placeholder="Email"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="userpass" id="user_pass" autocomplete="off" placeholder="Password"></td>
		</tr>
		<tr>
			<td>Date of Birth</td>
			<td id="dobplace"></td>
		</tr>
		<tr>
			<td><button id="signupsubmit">Sign Up</button></td>
			<td><a href="login_form.php">Log In</a></td>
		</tr>
	</table>
	<table>
		<tr>
			<td><span id="usermessage"></span></td>
		</tr>
	</table>
</form>
</body>
</html>
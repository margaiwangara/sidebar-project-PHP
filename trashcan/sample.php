<?php


//start session
session_start();

$usersalute = $logout = $username = $jqinterg = "";
	if(!empty($_SESSION['user_id']) || !empty($_SESSION['email']))
	{
		//assign variables from the session values for easy manipulation
		$username = $_SESSION['name'];
		$usersalute = "Welcome ".$username;
		$logout = "Logout";

		if(!empty($_SESSION['confirmcode']))
		{
			echo
			 "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
			 <script type='text/javascript'>
			 	$(document).ready(function()
			 	{
			 		$('#confirmbg').fadeIn(900);
			 		$('#confirmation_box').fadeIn(1000);
					function activatecountdown()
					{
						var i = 30;
						var interval = setInterval(countdown,1000);

						function countdown()
						{
							if(i >= 0)
							{
								$('#countdowntd').html('Welcome to CodeFaceOff,<br/>Thank you for joining us. Please confirm your account. You can choose to confirm now or later depending on your preference in the next '+i+' secs');
								i--;
							}
							else
							{
								$('#confirmation_box').fadeOut(500);
								$('#modalbg').fadeIn(1000);
								$('#friend_suggest_box').slideDown(1000);
								clearInterval(interval);
							}
						}
					}
					activatecountdown();
				});
			</script>";
		}
	}
	else
		$usersalute = "Welcome Guest | <a href='login_forn.php'>Login</a> | <a href='signup.php'>Sign Up</a>";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style type="text/css">
		#modalbg
		{
			position: fixed;height: 100%;
			width:100%;background: black;
			opacity: .5;z-index: 1;
			margin: -8px 0px 0px -8px;
			display: none;
		}
		#confirmbg
		{
			position: fixed;height: 100%;
			width:100%;background: black;
			opacity: .5;z-index: 1;
			margin: -8px 0px 0px -8px;
			display: none;
		}
		#homestuff
		{
			border: solid black 2px;
			height: 85%;width:70%;
			top: 10%;left: 15%;
			position: absolute;
		}
		#friend_suggest_box
		{
			border-radius: 5px;
			height: 75%;width: 40%;
			position: absolute;
			left: 30%;top: 15%;
			z-index: 1;background: white;
			display: none;
			box-shadow: 0 0 10px #000000;
		}
		#profileimage
		{
			border-radius: 5px;
			height: 50%;width: 60%;
			position: absolute;
			left: 20%;top: 15%;
			z-index: 1;background: white;
			display: none;
			box-shadow: 0 0 10px #000000;
		}
		.image_shell
		{
			border-radius: 5px;
			height: 80%;width: 95%;
			position: absolute;
			left: 2.5%;top: 15%;
			border: solid black 2px;
		}
		.image_habitat
		{
			height: 92%;width: 30%;
			position: absolute;
			left: 2%;top: 4%;
			border: solid brown 2px;
		}
		.image_choice
		{
			border-radius: 5px;
			height: 92%;width: 65%;
			position: absolute;
			left: 34%;top: 4%;
			border: solid brown 2px;
		}
		#upldimg_table
		{
			height: 100%;width: 100%;
			font-family: cambria;
			color: green;position: absolute;
			text-align: center;
			cursor: pointer;
		}
		#upldimg_table  td
		{
			border: solid black 2px;
		}
		input[type="file"]
		{
			display: none;
		}
		.image_legend
		{
			position: absolute;
			top: 7%;left: 2.5%;
			font-family: cambria;
			font-size: 20px;font-weight: bold;
			color: brown;
		}
		.loadbar_shell
		{
			position: absolute;
			height: 5%;width: 15%;
			border: solid black 2px;
			left: 15%;border-radius: 5px;
			display: none;

		}
		.loadbar
		{
			height: 100%;width: 1%;
			background: green;
			position: absolute;
		}
		.suggest_display
		{
			position: absolute;
			height: 80%;width: 90%;
			border-radius: 5px;border: solid black 2px;
			top: 12%;left: 5%;
			overflow-y: auto;
		}
		.welcome_message
		{
			font-family: cambria;
			position: absolute;top: 2%;
			color: brown;font-size: 20px;
			left: 5%;font-weight: bold;
			text-align: center;width: 90%;
		}
		.friend_legend
		{
			font-family: cambria;
			position: absolute;top: 8%;
			color: brown;font-size: 15px;
			left: 5%;
		}
		#friend_suggest_table
		{
			border: solid black 2px;
			width: 95%;left: 2.5%;
			position: absolute;
			top: 2%;height: 20%;
			border-radius: 5px;
		}
		.image_display
		{
			position: absolute;
			height: 17%;width: 15%;
			border: solid brown 2px;
			left: 3.5%;top: 3%;
		}
		.username
		{
			left: 18%;position: absolute;
			font-family: cambria;font-weight: bold;
		}
		.friendskip a
		{
			position: fixed;bottom: 12%;
			right: 31.8%;text-decoration: none;
			font-family: cambria;color: brown;
		}
		.pictureskip a
		{
			position: absolute;
			top: 8%;right: 2.5%;
			font-family: cambria;
			text-decoration: none;
			color: brown;
		}
		.errorbox
		{
			position: absolute;
			top: 8%;right: 2.5%;
			font-family: red;
			color: brown;
		}
		.loadbar_counter
		{
			position: absolute;
			left: 15.6%;font-size: 11px;
			top: 36.5%;font-family: cambria;
			font-weight: bold;color:green;
			display: none;
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
		#confirmation_box
		{
			position: absolute;
			background: white;
			z-index: 1;
			height: 22%;width: 43%;
			top: 20%;left: 28%;
			border-radius: 5px;
			font-family: cambria;
			display: none;
		}
		#confirmation_box table
		{
			border: solid black 2px;
			position: absolute;
			height: 50%;top: 5%;
			border-radius: 5px;
			width: 95%;left: 2.5%;
		}
		#confirmation_box button
		{
			font-family: calibri;
			font-size: 15px;
			cursor: pointer;

		}
		.smallconfirmbox
		{
			position: absolute;
			height: 8%;width: 20%;
			border: solid black 2px;
			right: 15%;background: white;
			margin-top: -5px;border-radius: 5px;
			display: none;

		}
		.smallconfirmbox table
		{
			font-family: cambria;
			font-weight: bold;
			color: brown;font-size: 14.5px;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			var names;
			$.ajax({
				url:"suggestfriends.php",
				type:"POST",
				dataType:"json",
				data:"",
				success:function(data)
				{
					names = Array(data.names);
					user_ids = Array(data.names_id);
					if(data.message == 1 && data.is_newbie == 0)
					{
						var nametable = "";
						names[0].forEach(function(value,key)
						{
							nametable += "<tr><th><div class='username'>"+names[0][key]+"</div></th></tr><tr><td align='right' style='padding-right: 4px;'><button 			class ='send_request'>Add Friend</button></td><td class='user_id_value' style='display:none;'>"+user_ids[0][key]+"</td></tr>";

							
						});
						nametable += "";

						$("#suggest_display").css({'overflow-y':'auto','height':'20%'});
						$("#friend_suggest_table").html(nametable);


						var alldata = $("#friend_suggest_table").find('button');
						var user_names = $("#friend_suggest_table").find('th');
						var ids_final = $("#friend_suggest_table").find('td.user_id_value');

						setTimeout(function()
						{
							alldata.each(function(index,value)
							{
								$(this).on('click',function(e)
								{
									e.preventDefault();

									alert("You pressed button number "+index+" which belongs to "+user_names.eq(index).text()+" of id: "+ids_final.eq(index).text());
									$.ajax({
										url:"sendfriendrequest.php",
										type:"POST",

										dataType:"html",
										data:{info:ids_final.eq(index).text()},

										success:function(friends)
										{
											alert(friends);
										}
									});

									return false;
								});
							});
							

						},300);



						function ErrorHandle()
						{

							$("#btn_confirmlater").on('click',function(e)
							{
								e.preventDefault();
								$("#confirmbg").fadeOut(1000);
								$("#modalbg").fadeIn(1000);
								$("#confirmation_box").fadeOut(500);
								$("#friend_suggest_box").slideDown(1000);
								$(".smallconfirmbox").fadeIn(1000);
							});

							$("#confirmbg, #confmodal_img").on('click',function(e)
							{
								e.preventDefault();

								$("#confirmbg").fadeOut(1000);
								$("#modalbg").fadeIn(1000);
								$("#confirmation_box").fadeOut(500);
								$("#friend_suggest_box").slideDown(1000);
								$(".smallconfirmbox").fadeIn(1000);

							});
							$("#btn_confirmnow").on('click',function(e)
							{
								e.preventDefault();
								$.ajax({
									url:"accountconfirm.php",
									type:"POST",

									dataType:"html",
									data:"",
									cache:false,
									success:function(somedata)
									{
										if(somedata == 1)
										{
											alert("Activation Successfull");
											$("#confirmbg").fadeOut(1000);
											$("#modalbg").fadeIn(1000);
											$("#confirmation_box").fadeOut(500);
											$("#friend_suggest_box").slideDown(1000);
											$(".smallconfirmbox").fadeOut(1000);
											
										}
										else
										{
											alert(somedata);
										}
										
									}
								});
							});
							
						}
						ErrorHandle();
							
					}
				}
			});

			
			//alert(mytext);
			
			$("#modalbg, #closemodal_img").on('click',function()
			{
				$("#profileimage").slideUp(700);
				$("#friend_suggest_box").slideUp(700);
				$("#modalbg").fadeOut(1000);
			});
			$(".friendskip").on('click',function(e)
			{
				e.preventDefault();
				$("#friend_suggest_box").animate({width:'toggle'},800);
				$("#profileimage").animate({width:'toggle'},1000);
			});

			

		});
		$(document).ready(function()
		{
			
			$("#image_id").on('change',function(e)
			{
				e.preventDefault();
				var formdata = new FormData($("form#uploadimage")[0]);
				$.ajax({
					url:"userimageupload.php",
					type:"POST",

					dataType:"html",
					data:formdata,
					processData: false,
					contentType: false,
					success:function(imagedata)
					{
						var userimg_path = imagedata;
						if(imagedata != 0)
						{
							imageloader();
							setTimeout(function(){
								$(".image_habitat").children('img').attr('src',userimg_path);

							},5060)
						}
						else
						{
							$(".errorbox").css({'color':'red','font-family':'cambria','font-weight':'bold'});
							$(".errorbox").html("Error: Image not uploaded").fadeIn(300);
							$(".errorbox").fadeOut(7000);
						}
					}
				});

			});

			function imageloader()
			{
				var time = 1;
				var interval = setInterval(loader,50);

				function loader()
				{
					if(time < 100)
					{
						time++;
						$(".loadbar_shell").show();
						$(".loadbar").css({'width':time+'%'});
						$(".loadbar_counter").html("Uploading..."+time+"%").show();
						
					}
					else if(time == 100)
					{
						$(".loadbar_counter").html("Upload Complete").show();
						$(".loadbar_counter").fadeOut(3000);
						$(".loadbar_shell").fadeOut(3000);
						clearInterval(interval);
					}
				}
			}
		});
		$(document).ready(function()
		{
			$(".image_habitat img").css({'height':'100%','width':'100%','object-fit':'cover','cursor':'pointer'});
			$.ajax({
				url:"userimageget.php",
				type:"POST",

				dataType:"json",
				data:"",
				cache:false,
				success:function(image_path)
				{
					//give the image data to variables taking care of those who don't have images
					var pro_path = image_path.imagepath;

					if(image_path.confirmation == 1)
					{
						$(".image_habitat").children('img').attr('src',pro_path);
					}
					

				}
			})
		});
	</script>
</head>
<body>
<div class="saluteuser"><?php echo $usersalute." | <a href='' id='lfindbuddies'>Find Friends</a> | <a href='' id='mymessages'>Messages</a> | <a href='' id='myprofile'>Profile</a><a href='signout.php'> | ".$logout."</a>";?></div>
<div id="homestuff"></div>
<div id="modalbg"></div>
<div id="confirmbg"></div>
<div class="smallconfirmbox">
	<form id="closeconfirm_form">
		<table id="closeconfirm_table">
			<tr>
				<td>Confirm Account Before Logging Out. Avoid Data Loss!</td>
				<td style=""><br/><button id="btn_confirmnow">Confirm</button></td>
			</tr>
		</table>
	</form>
</div>
<div id="confirmation_box">
<img src="images/closemodal.png" height="15" width="15" alt="closeModal" align="right" style="cursor: pointer;" id="confmodal_img"/>
<form id="confirmation_form" action="" method="post">
	<table>
		<tr>
			<th style="border-bottom: solid black 2px;color: brown;font-size: 20px;">Account Confirmation</th>
		</tr>
		<tr>
			<td style="line-height: 20px;" id="countdowntd"></td>
		</tr>
		<tr>
			<td style="float: right;"><button id="btn_confirmnow" style="margin-right: 5px;">Confirm</button><button id="btn_confirmlater">Confirm Later</button></td>
		</tr>
	</table>
</form>
</div>
<div id="friend_suggest_box">
	<img src="images/closemodal.png" height="20" width="20" alt="closeModal" align="right" style="cursor: pointer;" id="closemodal_img"/>
	<div class="welcome_message">CodeFaceOff: Send Requests</div>
	<div class="friend_legend">Here are a few friend suggestions for you</div>
	<div class="suggest_display">
		<form action="" method="post" id="friend_suggests">
			<table id="friend_suggest_table">


			</table>
			<!--suggestions table goes here-->
		</form>
		<div class="friendskip"><a href="">Skip</a></div>
	</div>
</div>
<div id="profileimage">
	<img src="images/closemodal.png" height="20" width="20" alt="closeModal" align="right" style="cursor: pointer;" id="closemodal_img"/>
	<!--<div class="pictureskip"><a href="">Skip</a></div>-->
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

</body>
</html>


<?php

require_once("db/dbaccess.php");
$image_lane = "";
$getimages = "SELECT memberise.email,images.image,images.img_type FROM images INNER JOIN memberise ON memberise.user_id = images.owner_id ORDER BY img_id DESC";
	$imagesquery = mysqli_query($conn,$getimages);
		if(mysqli_num_rows($imagesquery) > 0)
		{
			$fetchdata = mysqli_fetch_assoc($imagesquery);
			$img_path = $fetchdata['image'];
			$img_type = $fetchdata['img_type'];
			$owner_email = $fetchdata['email'];
			$image_lane = $img_path;
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload Pictures</title>
	<style type="text/css">
		#imagecenter
		{
			border: solid black 3px;
			height: 40%;width: 30%;
			position: absolute;
			top: 45%;left: 20%; 
		}
		.testimgone
		{
			position: absolute;
			height: 90%;width: 50%;
			top: 5%;left: 5%;
			border: solid brown 2px;
		}
		.testimgone img
		{
			height: 100%;width: 100%;
			object-fit: cover;
			cursor: pointer;
		}
		#imagecover
		{
			border: solid black 3px;
			height: 38%;width: 60%;
			position: absolute;
			top: 5%;left: 20%; 
		}
		#imagecover img
		{
			height: 100%;width: 100%;
			object-fit: cover;
			cursor: pointer;
		}
		.useroptions
		{
			border: solid black 2px;
			position: absolute;
			height: 11%;width: 100%;
			bottom: 0%;background: black;
			margin-left: -2px;
			opacity: .7;display: none;
		}
		.useroptions table 
		{
			font-family: calibri;
			font-size: 15px;font-weight: bold;
			color: white;
			cursor: pointer;
		}
		#modalbg
		{
			position: fixed;
			height: 100%;width: 100%;
			opacity: .6;background: black;
			margin: -8px 0px 0px -8px;
			z-index: 1;
			display: none;
		}
		#modaldelete
		{
			position: fixed;
			height: 15%;width: 50%;
			top: 30%;left: 20%;
			background: white;
			z-index: 1;border-radius: 7px;
			box-shadow:0px 0px 2px 2px rgba(0,0,0,0.5);
			display: none;
			
		}
		.userdecision
		{
			border: solid black 2px;
			position: absolute;
			top: 10%;border-radius: 5px;
			left: 5%;width: 90%;
			height: 80%;

		}
		#modalchange
		{
			position: fixed;
			height: 30%;width: 50%;
			top: 30%;left: 20%;
			background: white;
			z-index: 1;border-radius: 7px;
			box-shadow:0px 0px 2px 2px rgba(0,0,0,0.5);
			display: none;
			
		}
		.changedcsion
		{
			height: 100%;width: 90%;
			top: 5%;left: 2%;
			position: absolute;
		}
		#changeselect
		{
			width: 100%;height: 70%;
			border: solid brown 3px;
			border-radius: 7px;
			text-align: center;
			font-family: calibri;font-weight: bold;
			cursor: pointer;
		}
		#imageform
		{
			width: 100%;height: 100%;
		}
		#userblinder
		{
			color: green;
			font-weight: bold;
			font-family: times new roman;
			line-height: 2px;
			font-size: 15px;
			display: none;

		}
		input[type="file"]
		{
			display: none;
		}
		#imgblinder
		{
			border: solid black 2px;
			height: 5%;width: 17%;
			position: absolute;
			top: 55%;border-radius: 7px;
			left: 14.5%;display: none;
		}
		.movingbar
		{
			position: inherit;
			height: 100%;
			width:1%;background: green;
			border-radius: inherit;
		}
		.displaylegend
		{
			height: 2%;width: 30%;
			position: absolute;left: 15%;
			top: 63%;border-radius: 7px;
			font-weight: bold;font-family: calibri;
			font-size: 12px;
			color: green;display: none;
			text-align:left;
		}
		
	</style>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script type="text/javascript">
		var allgood = true;
		$(document).ready(function(){
			$("#testsubsuccess").on('mouseover',function(){
				$(".useroptions").slideToggle();
			});
			$("#testsubsuccess").on('mouseout',function(){
				$(".useroptions").slideToggle();
			});
			$("#cpictab").on('click', function(){
				$("#modalbg").show();
				$("#modalchange").slideToggle();
			});
			$("#dpictab").on('click', function(){
				$("#modalbg").show();
				$("#modaldelete").slideToggle();
			});
			$(".closeimg , #modalbg").on('click', function(){
				$("#modalbg").fadeOut(1000);
				$("#modalchange").slideUp(800);
				$("#modaldelete").slideUp(800);
			});
			$("#deletecancel").on('click',function(){
				$("#modalbg").fadeOut(1000);
				$("#modaldelete").slideUp(800);
			});
			$("#deleteyes").on('click',function(){
				var time = 0;
				do
				{
					$("#userblinder").fadeIn();
					$("#userblinder").fadeOut();
					time += 1000;

				}while(time < 3000);
				setTimeout(function(){
					$("#modalbg").fadeOut(1000);
					$("#modaldelete").slideUp(800);
					$(".testimgone").children('img').attr('src','images/avatar.png');
				},time);
				
				
			});
			$(".image_id").on('change',function(e)
			{
				
				e.preventDefault();
				ImageLoadBlinder();

				var formdata = new FormData($("form#imageform")[0]);
				$.ajax({
					url:"uploadimage.php",
					type:"POST",

					
					data:formdata,
					dataType:"html",

					processData: false,
					contentType: false,
					success:function(data)
					{
						imagepath = data;
						//alert(data);
						//alert(data.image_path);
						//$(".tempmessage").html(data);
						
						setTimeout(function(){
							$(".testimgone").children('img').attr('src',data);
						},6050);
						
					}
				});
			});
	

		function ImageLoadBlinder()
		{	
			var width = 1;	
			var loadinterval = setInterval(LoadBarProcess,60);
			function LoadBarProcess()
			{
				if(width < 100)
				{
					$("#imgblinder").show();
					width++;
					$(".movingbar").css("width",width+'%');
					$(".displaylegend").html("Uploading..."+width+"%").fadeIn();

				}
				else if(width == 100)
				{
					$(".displaylegend").html("Upload Complete: "+width+"%");
					$("#modalbg").fadeOut(1000);
					$("#modalchange").slideUp(800);
					width++;
					clearInterval(loadinterval);
					$("#imgblinder").hide();
					$(".displaylegend").hide();
					
				}
			}
		}
			
		});

	</script>
</head>
<body>
<div id="modalbg"></div>
<div id="picmodal"></div>
<div id="imagecenter">
	<div class="testimgone">
		<div class="useroptions">
			<table>
				<tr>
					<td style="border-right: solid brown 3px;" id="cpictab">Change Picture</td>
					<td id="dpictab">Delete Picture</td>
				</tr>
			</table>
		</div>
		<?php echo "<img src='".$image_lane."' alt='testsubject001' id='testsubsuccess'/>";?>
	</div>
</div>
<div id="imagecover">
	<img src="images/testsubtwo.jpg" alt="testsubject002" id="testsubtwo"/>
</div>

<div id="modalbg"></div>
<div id="modaldelete">
<div class="closeimg" style="position: absolute;right: 2px;cursor: pointer;"><img src="images/closemodal.png" alt="close modal" width="20" height="20"/></div>
	<div class="userdecision">
		<table>
			<tr>
				<td>Are you sure you want to delete this image?</td>
			</tr>
		</table>
		<table>
			<tr>
				<td><button id="deleteyes">Yes</button></td>
				<td><button id="deletecancel">Cancel</button></td>
				<td><span id="userblinder">Deleting...</span></td>
			</tr>
		</table>
	</div>
</div>
<div id="modalchange">
	<div class="closeimg" style="position: absolute;right: 2px;cursor: pointer;"><img src="images/closemodal.png" alt="close modal" width="20" height="20"/></div>
	<div class="changedcsion">
		<div class="pictureoplegend" style="margin: 0px 0px 5px 0px;"><font style="font-family: calibri;font-weight: bold;font-size: 17px;">Choose Picture Options:</font></div>
		<form action="uploadimage.php" method="post" enctype="multipart/form-data" id="imageform" name="imageform">
		<table id="changeselect" cellpadding="2">
			<tr>
				<td style="border-right: solid brown 3px;"><label class="file-input" style="cursor:pointer;">Choose From File<input type="file" class="image_id" name="userimage"/></label><div id="imgblinder"><div class="movingbar"></div></div>
				<div class="displaylegend"></div></td>
				<td>Choose From Album</td>
			</tr>
		</table>
		</form>
	</div>
</div>
</body>
</html>
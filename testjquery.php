<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title>Test My JQuery</title>
	<style type="text/css">
		#disappear
		{
			border: solid black 3px;
			height: 40%;width: 30%;
			position: absolute;
			top: 10%;left: 30%;
		}
		#buttons
		{
			position: absolute;
			top: 52%;left: 30%;
		}
		#modalbg
		{
			position: fixed;
			height: 100%;width: 100%;
			background: black;
			margin: -8px 0px 0px -8px;
			opacity: .7;z-index: 1;
			display: none;

		}
		#modal
		{
			position: absolute;
			top: 15%;left: 30%;
			height: 50%;width: 40%;
			background: white;
			z-index: 1;
			border-radius: 10px;
			display: none;
		}
		.fancynothings
		{
			height: 90%;width: 90%;
			position: absolute;
			top: 5%;left:5%; 
			border-radius: 7px;
			border: solid black 2px;
		}
		#modal img
		{
			position: absolute;
			right: 1%;top: 1%;
			cursor: pointer;
		}
		#imagecenter
		{
			border: solid black 3px;
			height: 40%;width: 30%;
			position: absolute;
			top: 10%;left: 62%; 
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
		.fancynothings img
		{
			height: 100%;width: 100%;
			object-fit: cover;
			margin: 0px;
		}
		#imagecover
		{
			border: solid black 3px;
			height: 38%;width: 55%;
			position: absolute;
			top: 58%;left: 30%; 
		}
		#imagecover img
		{
			height: 100%;width: 100%;
			object-fit: cover;
			cursor: pointer;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var colors = ['red','green','blue','purple','pink','yellow','brown','grey','orange'], color;

			$("#ccolor").on('click', function(){
					
			var rndcolors;
			do
			{
				rndcolors = colors[Math.floor(Math.random() * colors.length)];

			}
			while(color == rndcolors);
			$("#disappear").css('border','solid 3px');
			$("#disappear").css('border-color',rndcolors);
			color = rndcolors;
			});

			
			$("#chide").on('click', function(){
				$("#disappear").fadeOut();
			});
			$("#cshow").on('click', function(){
				$("#disappear").fadeIn();
			});
			$("#modalshow").on('click',function(){
				$("#modalbg").show();
				$("#modal").slideDown();
			});
			$("#modalbg , #closemodalimg").on('click',function(){
				$("#modal").slideUp(700);
				$("#modalbg").fadeOut(1100);
			});
			$("#testsubsuccess").on('click', function(){
				$("#modalbg").show();
				$("#modal").slideDown();
				$(".fancynothings").html("<img src='images/testsubone.jpg' alt='testsubject001'/>");
			});

			setTimeout(function()
				{
					alert("I am a real boy");
				},30800)


			function UserCountdown()
			{
				var i = 30;
				var interval = setInterval(stuffcounter,1000);

				function stuffcounter()
				{
					if(i >= 0)
					{
						$("#disappear").html("Countdown: "+i+" secs");
						i--;
						
					}
					else
						clearInterval(interval);	
				}
			}

			UserCountdown();
			$("#mycountdown").on('click',function(e)
			{
				UserCountdown();
			});
		})
	</script>

</head>
<body>
<div id="disappear">
	
</div>
<div id="modalbg"></div>
<div id="modal">
	<img src="images/closemodal.png" width="17" height="17" alt="closemodal" id="closemodalimg"/>
	<div class="fancynothings">
		
	</div>
</div>
<div id="buttons">
	<button id="ccolor">Change Border Color</button>
	<button id="chide">Hide</button>
	<button id="cshow">Show</button>
	<button id="modalshow">Show Modal</button>
	<button id="mycountdown">Show Countdown</button>
</div>
<div id="imagecenter">
	<div class="testimgone">
		<img src="images/testsubone.jpg" alt="testsubject001" id="testsubsuccess"/>
	</div>
</div>
<div id="imagecover">
	<img src="images/testsubtwo.jpg" alt="testsubject002" id="testsubtwo"/>
</div>
</body>
</html>
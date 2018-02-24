//upload images script
$(document).ready(function()
{
		
	$("#image_id").on('change',function(e)
	{
		e.preventDefault();

		if($("#image_id").val() == "")
			alert("It's empty do nothing");
		else
		{

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
	}
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

	//get images from db script
	$(".image_habitat img").css({'height':'100%','width':'100%','object-fit':'cover','cursor':'pointer'});
	$.ajax({
		url:"userimageget.php",
		type:"POST",

		dataType:"json",
		data:"",
		//cache:false,
		success:function(image_path)
		{
			//give the image data to variables taking care of those who don't have images
			var pro_path = image_path.imagepath;

			if(image_path.confirmation == 1)
			{
				$(".image_habitat").children('img').attr('src',pro_path);
				$(".userppic").html("<img src='"+pro_path+"' alt='UserImage001'/>");
			}
			

		}
	});
});


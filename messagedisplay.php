<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$.ajax({
				url:"messagedata.php",
				type:"POST",

				dataType:"json",
				data:"",
				success:function(data)
				{
					var sender_info = data.sender_id;
					var messages = data.messages;
					var errors = data.error;
					var datastore = [];
					var messagecoll;var rmesscoll;
					var everymess;

					
					sender_info.forEach(function(value,key)
					{
						if(datastore.indexOf(value) > -1)
						{
							rmesscoll += "<tr><td>"+messages[key]+"</td></tr>";

						}
						else
						{
							datastore.push(value);
							messagecoll += "<tr><th id='"+value+"'>Margai</th></tr><tr><td>"+messages[key]+"</td></tr>";
							rmesscoll += "<tr><th>"+value+"</th></tr><tr><td>"+messages[key]+"</td></tr>";
						}


					});
					

					$("#displaytbl").html(messagecoll);

					var tdata = $("#displaytbl").find('th');
					var inputdata = $("#samtext").attr("value","margai");
					alert(inputdata);
					tdata.each(function(index)
					{
						var thdata = $(this).attr('id');
						alert(thdata);
						sender_info.forEach(function(value,key)
						{
							$("#"+thdata).on('click',function()
							{
								if(value == thdata)
								{
									everymess += "<tr><th>"+value+"</th></tr><tr><td>"+messages[key]+"</td></tr>";
									$("#allmess").html(everymess);
								}

									
							});
							

						});

					});

					

				}
			});
		});
	</script>
</head>
<body>
<div id="displayhere">
	<table id="displaytbl" style="border: solid black 2px;">
		
	</table>
	<table id="allmess"></table>
	<input type="text" placeholder="Sometext" id="samtext" value=""/>
</div>

</body>
</html>
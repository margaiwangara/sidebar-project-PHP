$(document).ready(function()
{
	$("#submitmsg").on('click',function(e)
	{
		e.preventDefault();
		$.ajax({
			url:"messagesend.php",
			type:"POST",

			dataType:"html",
			data:$("#sendmsg").serialize(),
			success:function(data)
			{	
				$(".error_pri").html(data).fadeOut(2000);
				$("#email_rec").attr('readonly',false);
			}
		});
	});

	var polling = function(){
		$.ajax({
		url:"receivemessage.php",
		type:"POST",

		dataType:"json",
		data:"",
		success:function(data)
		{
			var senders_id = data.sender_id;
			var senders_names = data.sender_name;
			var messages = data.messages;
			var my_id = data.my_id;
			var id_store = [];var messagecoll;
			var msgext;var everymess;
			var emails = data.emails;

			senders_id.forEach(function(value,key)
			{
				if(id_store.indexOf(value) > -1)
				{
					msgext += "<tr><td>"+messages[key]+"</td></tr>";
				}
				else
				{
					id_store.push(value);
					messagecoll += "<tr><th id='"+value+"'>"+senders_names[key]+"</th></tr><tr><td id='"+value+"' style='border-bottom: dotted grey 2px;'>"+messages[key]+"</td></tr>";
				}

			});

			$("#incomings").html(messagecoll);

			var tdata = $("#incomings").find('th');
			tdata.each(function(index)
			{
				var thdata = $(this).attr('id');
				senders_id.forEach(function(value,key)
				{
					$("#"+thdata).on('click',function()
					{
						if(value == thdata)
						{
							everymess += "<tr><th>"+senders_names[key]+"</th></tr><tr><td>"+messages[key]+"</td></tr>";
							$("#email_rec").attr("value",emails[key]);
							$("#email_rec").attr('readonly',true);
							$("#display").html(everymess);
							$("#msg_txtarea").val("");
						}

							
					});
					

				});

			});
		}
	});
	}
	setInterval(polling,1000);
});
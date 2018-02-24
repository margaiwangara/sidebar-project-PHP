$(document).ready(function()
{
	$("#send_btn").on('click',function(e)
	{
		e.preventDefault();
		$.ajax({
			url:"chatboxsend.php",
			type:"POST",

			dataType:"html",
			data:$("#sendmess_form").serialize(),
			success:function(data)
			{
				$("#usermessage_id").val("");
			}
		});
	});
	var chatroom = function(){
		$.ajax({
		url:"chatbox.php",
		type:"POST",

		dataType:"json",
		data:"",
		success:function(data)
		{
			var message = data.chats
			var sender = data.senders

			var infoholder;
			sender.forEach(function(value,key)
			{
				infoholder += "<tr><th>"+value+"</th></tr><tr><td>"+message[key]+"</td></tr>";
			});
			
			$("#mess_tbl").html(infoholder);

		}
	});
	}
	setInterval(chatroom,1000);
});
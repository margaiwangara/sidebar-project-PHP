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


			alldata.each(function(index,value)
			{
				$(this).on('click',function(e)
				{
					e.preventDefault();

					//alert("You pressed button number "+index+" which belongs to "+user_names.eq(index).text()+" of id: "+ids_final.eq(index).text());
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

		
				});
			});
				
			$("#friends_display").on('click',function(e)
			{
					e.preventDefault();
					$("#friend_suggest_box").slideDown(1000);
					$("#modalbg").fadeIn(900);	
			});
		}
	});

	
	//alert(mytext);
	
	$("#modalbg, #closemodal_img").on('click',function()
	{
		$("#profileimage").slideUp(700);
		$("#friend_suggest_box").slideUp(700);
		$("#modalbg").fadeOut(1000);
	});
	$("#imgupload").on('click',function(e)
	{
		e.preventDefault();
		$("#modalbg").fadeIn(900);
		$("#profileimage").animate({width:'toggle'},1000);
	});

});
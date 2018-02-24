$(document).ready(function()
{
	var polling = function(){
		$.ajax({
		url:"notifications_php.php",
		type:"POST",

		dataType:"json",
		data:"",
		//cache:false,
		success:function(data)
		{
			//alert("im alive");
			var mybday = data.user_birthday;
			var myrequests = data.user_pending_request;
			var myfrbdays = data.user_friend_birthday;
			var error = data.errortext;
			var myrsender_ids = data.fsender_ids;
			var databind;var count = 0;
			var countfriends = data.friendcount;
			var friendsnames = data.friendsname;
			var friendlist;
			//alert(myrsender_ids);
			//alert(mybday);
			$("#showfriends").html("Friends <font color='brown;font-weight:bold;'>("+countfriends+")</font>");

			//put friends there
			friendsnames.forEach(function(value,key)
			{
				friendlist += "<tr><th>"+value+"</th></tr><tr><td style='border-bottom: dotted grey 2px;width: 100%;'><button id='friessagebtn' style='float: right;'>Message</button></td></tr>";
			});

			if(countfriends > 0)
			{
				$("#showfriends").on('click',function()
				{
					$("#modalbg").fadeIn(800);
					$("#listdisplay").slideDown(1000);
				})
			}

			//alert("Im going");prsinfo
			$("#prsinfo").on('click',function()
			{
				$(this).css({'color':'brown','font-weight':'bold'});
			});

			$("#eduinfo").on('click',function()
			{
				$(this).css({'color':'brown','font-weight':'bold'});
			});

			$("#workinfo").on('click',function()
			{
				$(this).css({'color':'brown','font-weight':'bold'});
			});

			$("#accntinfo").on('click',function()
			{
				$(this).css({'color':'brown','font-weight':'bold'});
			});


			//html it into the table
			$("#listtbl").html(friendlist);
			//alert(friendlist)
			if(mybday != "")
			{
				databind += "<tr><th>My Birthday</th></tr>";
				databind += "<tr><td>"+mybday+"</td></tr>";
				count+=1;
			}

			if(myfrbdays != "")
			{
				databind += "<tr><th>My Friend's Birthday</th></tr>";
				myfrbdays.forEach(function(value,key)
				{
					databind += "<tr><td>"+value+"</td></tr>";
					count+=1;
				});
			}

			if(myrequests != "")
			{
				databind += "<tr><th>Friend Requests</th></tr>";
				myrequests.forEach(function(value,key)
				{
					databind += "<tr><td>"+value+"</tr></td><td class='my_id' style='display:none;'>"+myrsender_ids[key]+"</td>";
					count+=1;
				});
			}

			if(count > 0)
				$("#notifylink").html("Notifications <font color='red' style='font-weight: bolder;'>("+count+")</font>");

			//display info onto the table
			$("#not_content").html(databind);

			function findlinks()
			{
				var fbirthday = $("#not_content").find('span');
				var frequests = $("#not_content").find('a');
				var frs_ids = $("#not_content").find('td.my_id');

				frequests.each(function(index)
				{
					$(this).on('click',function(e)
					{
						e.preventDefault();

						$("#acceptrequest").slideDown(1000);
						$(".friend_mes").html(frequests.eq(index).text()+" sent you a request here, probably because of idleness or boredom. Accept if you want, else that's none of my business");
						$("#btn_accept").on('click',function(e)
						{
							e.preventDefault();
							$.ajax({
								url:"acceptrequest.php",
								type:"POST",

								dataType:"html",
								data:{req_id:frs_ids.eq(index).text()},
								success:function(data)
								{
									if(data == 1)
									{
										$(".friend_mes").html("You are now friends with <font color='brown'>"+frequests.eq(index).text()+"</font>. You can now both be misserable together");
										$("#modalbg").fadeOut(2500);
										$("#acceptrequest").fadeOut(2500);
									}
									else
										alert(data);
								}
							})
						});
						$("#btn_delete").on('click',function(e)
						{
							e.preventDefault();

							$.ajax({
								url:"deleterequests.php",
								type:"POST",

								dataType:"html",
								data:{req_id:frs_ids.eq(index).text()},
								success:function(data)
								{
									if(data == 1)
									{
										$("#acceptrequest button").css({'display':'none'});
										$(".friend_mes").html("Request from <font color='brown'>"+frequests.eq(index).text()+"</font> has been deleted. Nice move, being miserable alone is both a good and stupid idea. Just don't do anything stupid");
										$("#modalbg").fadeOut(2500);
										$("#acceptrequest").fadeOut(2500);
									}
								}
							})
						});
						//alert("Yes sir "+frequests.eq(index).text()+" your id is "+frs_ids.eq(index).text());
					});
				});
				fbirthday.each(function(index)
				{
					$(this).on('click',function(e)
					{
						e.preventDefault();
						alert("Yes sir "+fbirthday.eq(index).text());
					});
				});

				

			}
			findlinks();

			$("#closemodal_img, #modalbg").on('click',function()
			{
				$("#modalbg").fadeOut(1000);
				$("#acceptrequest").slideUp(800);
				$("#listdisplay").slideUp(800);
			});
		}

	});
}
	setInterval(polling,500);
});
setTimeout(function()
						{
							

							alldata.each(function(index,value)
							{
								$(this).on('click',function(e)
								{
									e.preventDefault();
									alert("You pressed button number "+index+" which belongs to "+user_names.eq(index).text()+" of id: "+user_ids[0][index]);
									$.ajax({
										url:"sendfriendrequest.php",
										type:"POST",

										dataType:"html",
										data:real_ids,

										success:function(friends)
										{
											alert(friends);
										}
									});

									return false;
								});
							});
							

						},300);

$(document).ready(function()
		{
			alert("Im alive");
			$.ajax({
				url:"notifications_php.php",
				type:"POST",

				dataType:"json",
				data:"",
				cache:false,
				success:function(data)
				{
					var birthday = data.user_birthday;
					var friend_birthday = Array(data.user_friend_birthday);
					var	pending_request = Array(data.user_pending_request);
					var errotext = data.errotext;
					var btable, pending_table, mybirthday;

					alert(birthday);
					alert(errotext);
					alert(pending_request);
					/*
					if(birthday)
					{
						mybirthday = "<tr><th>My Birthday</th></tr><tr><td>"+birthday+"</td></tr>";
					}
					if(friend_birthday)
					{
						btable = "<tr><th>Friend's Birthdays</th></tr>";
						friend_birthday[0].forEach(function(value,key)
						{
							btable += "<tr><td>"+value+"</td></tr>";
						});
					}
					if(pending_request)
					{
						pending_request[0].forEach(function(value,key)
						{
							pending_table += "<tr><th>Friend Requests</th></tr><tr><td>"+value+"</td></tr>";
						});
					}
					if(errotext)
						alert(errotext);
					*/
					$("#not_content").html(pending_table+btable+mybirthday);
				}
			})
		});
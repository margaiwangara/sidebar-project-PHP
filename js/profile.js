$(document).ready(function()
{
	$.ajax({
		url:"getuserinfo.php",
		type:"POST",

		dataType:"json",
		data:"",
		success:function(data)
		{
			var dob = data.day;
			var mob = data.month;
			var yob = data.year;
			var email = data.email;
			var name = data.name;
			var university = data.university;
			var college = data.college;
			var highschool = data.highschool;
			var primary = data.primary;
			var work = data.work;
			var hobbies = data.hobbies;
			var likes = data.likes;

			$(".namebox").html(name);
			$(".emailbox").html(email);
			$(".dobbox").html(dob+" "+mob+" "+yob);
			$(".unibox").html(university);
			$(".collebox").html(college);
			$(".hsbox").html(highschool);
			$(".primobox").html(primary);
			$(".workbox").html(work);
			$(".hobbybox").html(hobbies);
			$(".likebox").html(likes);
			$(".username_display").html(name);
		}
	});

	var polling = function() {
		$.ajax({
		url:"userimageget.php",
		type:"POST",

		dataType:"json",
		data:"",
		success:function(data)
		{
			var imgpath = data.imagepath;
			var cmessage = data.confirmation;
			//image set to fit/cover
			
			if(cmessage == 1)
			{
				$(".profileimage").find('img').attr('src',imgpath);
				$(".profimage").find('img').attr('src',imgpath);
			}

			
		}

	});
	}
	setInterval(polling,1000);

	$("#submitpost").on('click',function(e)
	{
		e.preventDefault();

		$.ajax({
			url:"userposts.php",
			type:"POST",

			dataType:"html",
			data:$("#formposts").serialize(),
			success:function(data)
			{
				$(".errormessage").html(data).fadeIn(700);
				$(".errormessage").fadeOut(2000);
				$("#postsinput").val("");

			}
		});

	});
	var pollingretrieve = function(){
		$.ajax({
		url:"postsretrieve.php",
		type:"POST",

		dataType:"json",
		data:"",
		success:function(data)
		{
			var privacy = $("#userprivacy").val();
			var sess_id = data.user_id;
			var sess_name = data.user_name;
			var pubposter = data.pubposter;
			var pubposts = data.publicposts;
			var pubnames = data.pubnames;
			var friendposts = data.friendposts;
			var friendname = data.friendname;
			var frierror = data.frierror;
			var privateposts = data.privateposts;
			var display;

			//alert(pubposter);

			pubposter.forEach(function(value,key)
			{
				if(value == sess_id)
				{
					display += "<tr><th>"+pubnames[key]+"</th></tr><tr><td>"+pubposts[key]+"</td></tr>";
				}
			});

			friendposts.forEach(function(value,key)
			{
				if(friendname[key] == sess_name)
				{
					display += "<tr><th>"+friendname[key]+"</th></tr><tr><td>"+value+"</tr></td>";
				}	
			});

			privateposts.forEach(function(value,key)
			{
				display += "<tr><th>"+sess_name+"</th></tr><tr><td>"+value+"</tr></td>";
			});

			$("#postdisplay").html(display);
			}
		});

	}
	setInterval(pollingretrieve,1000);

	$(".profileimage img").on('mouseover',function()
	{
		$(".imageupload").slideToggle();
	});

	$(".profileimage img").on('mouseout',function()
	{
		$(".imageupload").slideToggle();
	});
	
});
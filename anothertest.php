<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title>Another Page, Another Day</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$.ajax({
				url:"notifications_php.php",
				type:"POST",

				dataType:"json",
				data:"",
				success:function(data)
				{
					alert("I reached here");
					alert(data);
				}
			})
		});
	</script>
</head>
<body>


</body>
</html>
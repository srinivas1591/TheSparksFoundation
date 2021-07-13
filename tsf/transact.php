<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sending Money</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<center>
		<?php 
			include 'nav.php';
			if(isset($_SESSION['warn']))
			{
				echo '<div id="warn1">'.$_SESSION['warn'].'</div>';
				unset($_SESSION['warn']);
			}
		?> 
		<div id="warn"></div>
		<form name="f" action="transactbackend.php" method="post" onsubmit="return validate();">
			<b>Transfer Money</b><br><br>
			<input type="text" name="a" placeholder="enter sender name"><br><br>
			<input type="text" name="b" placeholder="enter receiver name"><br><br>
			<input type="number" name="d" placeholder="enter amount"><br><br>
			<input type="submit" name="" value="transfer">
		</form>
	</center>

	<script type="text/javascript">
		function validate()
		{
			var a= document.f.a.value;
			var b= document.f.b.value;
			var d= document.f.d.value;
			if((a.trim()).length == 0 || (b.trim()).length == 0 || (d.trim()).length == 0)
			{
				document.getElementById('warn').innerHTML="Fields Can't be empty";
				document.getElementById('warn').style.display="inline-block";
				return false;
			}
		}
	</script>
</body>
</html>
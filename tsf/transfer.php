<?php 
	session_start();
	include 'database.php';
	if(!isset($_GET['user']))
		header('location:customers.php');
	$user=$_GET['user'];
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
		<form name="f" action="transerbackend.php" method="post" onsubmit="return validate();">
			<h2>Transferring Money from <?php echo $user;?> to :</h2>
			<input type="number" name="a" placeholder="enter accountnumber"><br><br>
			<input type="number" name="b" placeholder="enter money(in rs)"><br>
			<input type="hidden" name="c" value="<?php echo $mybal;?>"><br>
			<input type="hidden" name="d" value="<?php echo $user;?>"><br>
			<input type="submit" name="" value="submit">
		</form>
	</center>

	<script type="text/javascript">
		function validate()
		{
			var a= document.f.a.value;
			var b= document.f.b.value;
			var c= document.f.c.value;
			if((a.trim()).length == 0 || (b.trim()).length == 0)
			{
				document.getElementById('warn').innerHTML="Fields Can't be empty";
				document.getElementById('warn').style.display="inline-block";
				return false;
			}
		}
	</script>
</body>
</html>
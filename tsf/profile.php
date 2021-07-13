<?php 
	include 'database.php';
	if(!isset($_GET['user']))
		header('location:customers.php');
	$user=$_GET['user'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<?php 
		include 'nav.php';
	?>
	<center> 
		<div class="profile">
			<img src="user.png" width="20%">
			<table class="table">
				<?php 

					$fetchcustomers=mysqli_query($database , "select * from customers where customername='$user'");
					$cust=mysqli_fetch_assoc($fetchcustomers);

					echo '<tr><td id="l">Customer Name :</td><td>'.$cust['customername'].'</td></tr>';
					echo '<tr><td id="l">Email :</td><td>'.$cust['email'].'</td></tr>';
					echo '<tr><td id="l">Account Number :</td><td>'.$cust['accountnumber'].'</td></tr>';
					echo '<tr><td id="l">Bank Balance :</td><td>'.$cust['bankbalance'].'</td></tr>';
					echo '<tr><td colspan="2" align="center"><button id="view2"><a href="transfer.php?user='.$user.'">transer money</a></button></td></tr>';

				?>
			</table>
		</div>
	</center>
</body>
</html>
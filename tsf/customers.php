<?php 
	include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<?php 
		include 'nav.php';
	?>
	<center>
		<h2>Customer Details</h2>
		<table>
				<th>Account Number</th>
				<th>Customer Name</th>
				<th>Email</th>
				<th>Account Balance</th>
				<th></th>
			<tr><td colspan="5"><hr></td></tr>
			<?php 

				$fetchcustomers = mysqli_query($database,"select * from customers");

				while ($cust = mysqli_fetch_assoc($fetchcustomers)) 
				{
					echo '<tr><td>'.$cust['accountnumber'].'</td><td>'.$cust['customername'].'</td><td>'.$cust['email'].'</td><td>'.$cust['bankbalance'].'</td><td><button id="view"><a href="profile.php?user='.$cust['customername'].'">View Profile</a></button></td></tr>';
				}

			?>
		</table>
	</center>
</body>
</html>
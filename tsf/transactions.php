<?php 
	include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Transactions</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<?php 
		include 'nav.php';
	?>
	<center>
		<h2>Transaction Details</h2>
		<table>
			
				<th>Transaction Id</th>
				<th>Sender</th>
				<th>Receiver</th>
				<th>Date</th>
				<th>Transaction Amount</th>
				<tr><td colspan="5"><hr></td></tr>
			<?php 

				$fetchtransactions = mysqli_query($database,"select * from transfers order by date desc");

				while ($cust = mysqli_fetch_assoc($fetchtransactions)) 
				{
					echo '<tr><td>'.$cust['transactionid'].'</td><td>'.$cust['sender'].'</td><td>'.$cust['receiver'].'</td><td>'.$cust['date'].'</td><td>'.$cust['amount'].'</td></tr>';
				}

			?>
		</table>
	</center>
</body>
</html>
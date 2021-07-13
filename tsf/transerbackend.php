<?php
	session_start();
	include 'database.php';
	$actn= $_POST['a'];
	$money= $_POST['b'];
	$sender=$_POST['d'];
	$fetch=mysqli_query($database,"select * from customers where customername='$sender'");
	$cust=mysqli_fetch_assoc($fetch);
	$mybal=$cust['bankbalance'];
	$fetchaccount =  mysqli_query($database,"select * from customers where accountnumber='$actn'");
	if(mysqli_num_rows($fetchaccount)==0)
	{
		$_SESSION['warn']="Account Not Found";
		header('location:transfer.php?user='.$sender);
	}
	else if($mybal<$money)
	{
		$_SESSION['warn']='insufficient funds';
		header('location:transfer.php?user='.$sender);
	}
	else
	{
		$cust = mysqli_fetch_assoc($fetchaccount);
		$receiver= $cust['customername'];
		$id=uniqid();
		$date = date('Y-m-j');
		$insert = mysqli_query($database,"insert into transfers values('$sender','$receiver','$date','$money','$id')");
		if($insert)
		{
			$deduct = mysqli_query($database,"update customers set bankbalance=bankbalance-$money where customername='$sender'");
			$credit = mysqli_query($database,"update customers set bankbalance=bankbalance+$money where customername='$receiver'");

			if($deduct && $credit)
			{
				header('location:transactions.php');
			}
		}
	}
?>
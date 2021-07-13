<?php
	session_start();
	include 'database.php';
	$sender = $_POST['a'];
	$receiver = $_POST['b'];
	if($sender==$receiver)
	{
		$_SESSION['warn']="Sender and Receiver cant be same";
		header('location:transact.php');
	}
	else
	{
		$money =$_POST['d'];
		$fetch=mysqli_query($database,"select * from customers where customername='$sender'");
		$fetchaccount =  mysqli_query($database,"select * from customers where customername='$receiver'");
		$cust=mysqli_fetch_assoc($fetch);
		$mybal=$cust['bankbalance'];
		if(mysqli_num_rows($fetch)==0)
		{
			$_SESSION['warn']="Sender Not Found";
			header('location:transact.php');
		}
		else if(mysqli_num_rows($fetchaccount)==0)
		{
			$_SESSION['warn']="Receiver Not Found";
			header('location:transact.php');
		}
		else if($mybal<$money)
		{
			$_SESSION['warn']='insufficient funds';
			header('location:transact.php');
		}
		else
		{
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
	}
?>
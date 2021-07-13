<?php 

	$database = mysqli_connect("localhost","root","","tsfbank");
	if(!$database)
	{
		echo 'database not connected';
	}

?>
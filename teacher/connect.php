<?php

	$host_name = "localhost";
	$host_user = "kj5ie5k0ggso";
	$host_pass = "P@ch86eR";
	$db_name = "internship_sys";

	$conn = mysqli_connect($host_name, $host_user, $host_pass, $db_name);
	mysqli_query($conn,"SET NAMES UTF8");
	
	if(!$conn){
		die("connection failed !! " .mysqli_connect_error());
	}
// echo "Connected successfully";

?>

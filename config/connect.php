<?php

$hostname = "localhost";
$username = "kj5ie5k0ggso";
$password = "P@ch86eR";
$db_name = "internship_sys";

$conn = mysqli_connect($hostname, $username, $password, $db_name);
mysqli_query($conn, "SET NAMES UTF8");

if (!$conn) {
  die("connection failed !! -> " . mysqli_connect_error());
}

?>
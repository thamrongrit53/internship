<?php

include "connect.php";
ini_set('display_errors', 1);
	error_reporting(~0);
	$id=$_GET["id"];
    $sql = "DELETE FROM student WHERE std_id = '".$id."'";
    $sql1 = "DELETE FROM parent WHERE std_id = '".$id."'";
    $sql2 = "DELETE FROM emergency WHERE std_id = '".$id."'";
    $sql3 = "DELETE FROM company WHERE std_id = '".$id."'";
    $query = mysqli_query($conn,$sql);
    $query1 = mysqli_query($conn,$sql1);
    $query2 = mysqli_query($conn,$sql2);
    $query3 = mysqli_query($conn,$sql3);
	if($query) {
		$message = "ลบข้อมูลสำเร็จ";
  	echo "<script type='text/javascript'>alert('$message');</script>";
 		echo "<meta http-equiv=\"refresh\"content=\"0;URL=studentinternship.php\">\n";
	}
	mysqli_close($conn);
?>
<?php

	session_start();
	include "connect.php";

	$txtUsername = $_POST['email'];
	$txtPassword = md5($_POST['pass']);

	$strSQL = "SELECT * FROM `teacher` WHERE `th_email` = '$txtUsername' AND `th_pass` = '$txtPassword'";
	$objQuery = mysqli_query($conn, $strSQL);
	$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

	if(!$objResult) {

		$message = "ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง ";
  	echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<meta http-equiv=\"refresh\"content=\"0;URL=login.php\">\n"; 			
		
	} else {

		$_SESSION["UserID"] = $objResult["th_id"];
		$_SESSION["Username"] = $objResult["th_fname"]." ".$objResult["th_lname"];
		$_SESSION["firstname"] = $objResult["th_fname"];
		$_SESSION["lastname"] = $objResult["th_lname"];
		$_SESSION["email"] = $objResult["th_email"];
		$_SESSION["password"] = $objResult["th_pass"];
		$_SESSION["tel"] = $objResult["th_tel"];
	
		session_write_close();
		
		if($objResult) {
			header("location:admin.php");
		}

	}
	mysqli_close($conn);
?>
	
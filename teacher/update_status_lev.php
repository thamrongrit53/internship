<?php
session_start();
include "connect.php";
  mysqli_set_charset($objCon,"utf8");
        $app = $_POST["approve"];
        $id = $_GET["id"];
        echo $app;
        echo $id;
		$str = "UPDATE leaves SET lev_approved='$app' WHERE lev_id='$id'";
		$objQuery = mysqli_query($conn,$str);	

?>
 
 <script type="text/JavaScript">
   setTimeout("location.href = 'https://www.sbac.online/internship/teacher/Record_leave.php';",1000);
</script>

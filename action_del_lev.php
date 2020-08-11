<?php

include "./config/connect.php";
session_start();

$std_id = $_SESSION["std_id"];
$lev_id = $_GET["del_id"];

if(!empty($lev_id)) {
  $sql = "DELETE FROM `leaves` WHERE `lev_id`='$lev_id' AND `std_id`='$std_id' ";
  $query = mysqli_query($conn, $sql);
  if($query) {
    echo "<meta http-equiv=\"refresh\"content=\"0;URL=index.php?page=leaves\">\n";
  } else {
    echo "เกิดข้อผิดพลาด";
  }
} else {
  echo "<meta http-equiv=\"refresh\"content=\"0;URL=index.php?page=leaves\">\n";
}

mysqli_close($conn);
?>
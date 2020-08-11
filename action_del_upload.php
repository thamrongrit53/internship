<?php

include "./config/connect.php";
$std_id = $_SESSION["std_id"];

if(isset($_GET["action"])) {
  if($_GET["action"] == "std"){
    $query = "UPDATE `student` SET `std_photo`=0 WHERE `std_id`='$std_id' ";
    $result = mysqli_query($conn, $query);

    $image_name = $std_id."_std_photo.jpg";
    $url = "images/students/".$image_name;
    $del_img = unlink($url);

    if($result && $del_img) {
      echo "<meta http-equiv=\"refresh\"content=\"0;URL=index.php?page=register_upload\">\n";
    }
  } 
  
  if ($_GET["action"] == "map") {
    $query = "UPDATE `company` SET `comp_map`=0 WHERE `std_id`='$std_id' ";
    $result = mysqli_query($conn, $query);

    $image_name = $std_id."_comp_map.jpg";
    $url = "images/students/".$image_name;
    $del_img = unlink($url);

    if($result && $del_img) {
      echo "<meta http-equiv=\"refresh\"content=\"0;URL=index.php?page=register_upload\">\n";
    }
  }

  if ($_GET["action"] == "chart") {
    $query = "UPDATE `company` SET `comp_chart`=0 WHERE `std_id`='$std_id' ";
    $result = mysqli_query($conn, $query);

    $image_name = $std_id."_comp_chart.jpg";
    $url = "images/students/".$image_name;
    $del_img = unlink($url);

    if($result && $del_img) {
      echo "<meta http-equiv=\"refresh\"content=\"0;URL=index.php?page=register_upload\">\n";
    }
  }
}

mysqli_close($conn);
?>
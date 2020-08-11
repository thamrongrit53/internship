<?php

include "./config/connect.php";
session_start();
$std_id = $_SESSION["std_id"];

if(isset($_POST["action"])) {
  if($_POST["action"] == "up_std"){
    $tmp_file = $_FILES["image"]["tmp_name"];
    $image_name = $std_id."_std_photo.jpg";
    $url = "images/students/".$image_name;
    $query = "UPDATE `student` SET std_photo = '$image_name' WHERE `std_id`='$std_id' ";

    if(move_uploaded_file($tmp_file, $url)){
      if(mysqli_query($conn, $query)) {
        echo "
          <script>
            Swal.fire({
              type: 'success',
              title: 'สำเร็จ',
              text: 'อัพโหลดรูปภาพสำเร็จ'
            });
            setTimeout(() => {
              window.location.href = 'index.php?page=register_upload';              
            }, 1000);
          </script>
        ";
      } else {
        echo "
          <script>
            Swal.fire({
              type: 'error',
              title: 'ข้อผิดพลาด',
              text: 'เกิดข้อผิดพลาด กรุณาตรวจสอบอีกครั้ง'
            });
          </script>
        ";
      }
    }
  }

  if($_POST["action"] == "up_map"){
    $tmp_file = $_FILES["image"]["tmp_name"];
    $image_name = $std_id."_comp_map.jpg";
    $url = "images/students/".$image_name;
    $query = "UPDATE `company` SET comp_map = '$image_name' WHERE `std_id`='$std_id' ";

    if(move_uploaded_file($tmp_file, $url)){
      if(mysqli_query($conn, $query)) {
        echo "
          <script>
            Swal.fire({
              type: 'success',
              title: 'สำเร็จ',
              text: 'อัพโหลดรูปภาพสำเร็จ'
            });
            setTimeout(() => {
              window.location.href = 'index.php?page=register_upload';              
            }, 1000);
          </script>
        ";
      } else {
        echo "
          <script>
            Swal.fire({
              type: 'error',
              title: 'ข้อผิดพลาด',
              text: 'เกิดข้อผิดพลาด กรุณาตรวจสอบอีกครั้ง'
            });
          </script>
        ";
      }
    }
  }

  if($_POST["action"] == "up_chart"){
    $tmp_file = $_FILES["image"]["tmp_name"];
    $image_name = $std_id."_comp_chart.jpg";
    $url = "images/students/".$image_name;
    $query = "UPDATE `company` SET comp_chart = '$image_name' WHERE `std_id`='$std_id' ";

    if(move_uploaded_file($tmp_file, $url)){
      if(mysqli_query($conn, $query)) {
        echo "
          <script>
            Swal.fire({
              type: 'success',
              title: 'สำเร็จ',
              text: 'อัพโหลดรูปภาพสำเร็จ'
            });
            setTimeout(() => {
              window.location.href = 'index.php?page=register_upload';              
            }, 1000);
          </script>
        ";
      } else {
        echo "
          <script>
            Swal.fire({
              type: 'error',
              title: 'ข้อผิดพลาด',
              text: 'เกิดข้อผิดพลาด กรุณาตรวจสอบอีกครั้ง'
            });
          </script>
        ";
      }
    }
  }
}

mysqli_close($conn);

?>
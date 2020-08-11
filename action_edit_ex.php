<?php

include "./config/connect.php";
session_start();

$std_id = $_SESSION["std_id"];
$ext_id = $_POST["ext_id"];
$ext_job = $_POST["ext_job"];
$ext_detail = $_POST["ext_detail"];
$ext_assigner = $_POST["ext_assigner"];

if(empty($ext_id) || empty($ext_job) || empty($ext_detail) || empty($ext_assigner)) {
  echo "
    <script>
      Swal.fire({
        type: 'warning',
        title: 'กรุณาตรวจสอบ',
        text: 'ข้อมูลไม่ครบถ้วน กรุณาตรวจสอบใหม่อีกครั้ง'
      });
    </script>
  ";
} else {
  $sql = "UPDATE `ext_intern` SET `ext_job`='$ext_job', `ext_detail`='$ext_detail', `ext_assigner`='$ext_assigner' 
          WHERE `ext_id`='$ext_id' AND `std_id`='$std_id' ";
  $query = mysqli_query($conn, $sql);

  if($query) {
    echo "
      <script>
        Swal.fire({
          type: 'success',
          title: 'สำเร็จ',
          text: 'บันทึกข้อมูลสำเร็จ'
        });
        setTimeout(() => {
          window.location.href = 'index.php?page=ex_job_record';      
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
mysqli_close($conn);
?>
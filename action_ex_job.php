<?php

include "./config/connect.php";
session_start();

$std_id = $_SESSION["std_id"];
$ext_date = $_POST["ext_date"];
$ext_job = $_POST["ext_job"];
$ext_detail = $_POST["ext_detail"];
$ext_assigner = $_POST["ext_assigner"];

if(empty($ext_date) || empty($ext_job) || empty($ext_detail) || empty($ext_assigner)) {
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
  $sql = "INSERT INTO 
          `ext_intern` (`ext_date`, `std_id`, `ext_job`, `ext_detail`, `ext_assigner`)
          VALUES ('$ext_date','$std_id','$ext_job','$ext_detail', '$ext_assigner')";
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
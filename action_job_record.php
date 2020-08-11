<?php

include "./config/connect.php";
session_start();

$std_id = $_SESSION["std_id"];
$wd_week = $_POST["wd_week"];
$wd_first_day = $_POST["wd_first_day"];
$wd_last_day = $_POST["wd_last_day"];
$wd_dept = $_POST["wd_dept"];
$wd_job = $_POST["wd_job"];
$wd_issue = $_POST["wd_issue"];
$wd_fix = $_POST["wd_fix"];
$wd_exp = $_POST["wd_exp"];
$wd_solve = $_POST["wd_solve"];
$wd_comment = $_POST["wd_comment"];

if( empty($wd_week) || empty($wd_first_day) || empty($wd_last_day) || empty($wd_dept) || empty($wd_job) || 
  empty($wd_issue) || empty($wd_fix) || empty($wd_exp) || empty($wd_solve) || empty($wd_comment)) {
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
  $first_day = new DateTime($wd_first_day);
  $last_day = new DateTime($wd_last_day);

  if($first_day >= $last_day) {
    echo "
      <script>
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'วันที่ ไม่สมเหตุสมผล กรุณาตรวจสอบใหม่อีกครั้ง'
        });
      </script>
    ";
  } else {
    $sql_check = "SELECT * FROM `work_detail` WHERE `wd_week`='$wd_week' AND `std_id`='$std_id' ";
    $query_check = mysqli_query($conn, $sql_check);
    $check_count = mysqli_num_rows($query_check);

    if($check_count == 1) {
      echo "
        <script>
          Swal.fire({
            type: 'warning',
            title: 'กรุณาตรวจสอบ',
            text: 'สัปดาห์นี้ได้มีการบันทึกข้อมูลแล้ว กรุณาตรวจสอบอีกครั้ง'
          });
        </script>
      ";
    } else {
      $sql = "INSERT INTO `work_detail` (`wd_week`, `wd_first_day`, `wd_last_day`, `wd_dept`, `wd_job`, 
              `wd_issue`, `wd_fix`, `wd_exp`, `wd_solve`, `wd_comment`, `std_id`)
              VALUES ('$wd_week', '$wd_first_day', '$wd_last_day', '$wd_dept', '$wd_job',
              '$wd_issue', '$wd_fix', '$wd_exp', '$wd_solve', '$wd_comment', '$std_id')";
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
              window.location.href = 'index.php?page=job_record';              
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
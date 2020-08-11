<?php

include "./config/connect.php";
session_start();
  
$std_id = $_SESSION["std_id"];
$wd_id = $_GET["del_id"];

if(!empty($wd_id)) {
  $sql = "DELETE FROM `work_detail` WHERE `wd_id`='$wd_id' AND `std_id`='$std_id' ";
  $query = mysqli_query($conn, $sql);
  if($query) {
    echo "<meta http-equiv=\"refresh\"content=\"0;URL=index.php?page=job_record\">\n";
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
} else {
  echo "<meta http-equiv=\"refresh\"content=\"0;URL=index.php?page=job_record\">\n";
}
mysqli_close($conn);
?>
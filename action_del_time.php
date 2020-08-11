<?php
include "./config/connect.php";
session_start();
  
$std_id = $_SESSION["std_id"];
$wt_id = $_GET["del_id"];

if(!empty($wt_id)) {
  $sql = "DELETE FROM `work_time` WHERE `wt_id`='$wt_id' AND `std_id`='$std_id' ";
  $query = mysqli_query($conn, $sql);
  if($query) {
    echo "<meta http-equiv=\"refresh\"content=\"0;URL=index.php?page=time_record\">\n";
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
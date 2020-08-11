<?php

include "./config/connect.php";
session_start();

$std_id = $_SESSION["std_id"];
$wt_id = $_POST["wt_id"];
$wt_in_time = $_POST["wt_in_time"];
$wt_out_time = $_POST["wt_out_time"];

if(empty($wt_id) || empty($wt_in_time) || empty($wt_out_time)) {
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
  $come = new DateTime($wt_in_time);
  $out = new DateTime($wt_out_time);

  if($come >= $out) {
    echo "
      <script>
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'เวลามาและเวลากลับ ไม่สมเหตุสมผลกัน กรุณาตรวจสอบใหม่อีกครั้ง'
        });
      </script>
    ";
  } else {
    $timeDiff = TimeDiff($wt_in_time, $wt_out_time);
    $sql = "UPDATE `work_time` SET `wt_in_time`='$wt_in_time', `wt_out_time`='$wt_out_time', `wt_total`='$timeDiff'
            WHERE `wt_id`='$wt_id' AND `std_id`='$std_id' ";
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
            window.location.href = 'index.php?page=time_record';      
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

function TimeDiff($time1,$time2){
  return (strtotime($time2) - strtotime($time1))/  ( 60 * 60 ); // 1 Hour =  60*60
}

mysqli_close($conn);
?>
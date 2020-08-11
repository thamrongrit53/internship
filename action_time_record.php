<?php

include "./config/connect.php";
session_start();

$std_id = $_SESSION["std_id"];
$date = $_POST["date"];
$come_time = $_POST["come_time"];
$out_time = $_POST["out_time"];
$lat = $_POST["lat"];
$lng = $_POST["lng"];
if(empty($date) || empty($come_time) || empty($out_time)) {
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
  $come = new DateTime($come_time);
  $out = new DateTime($out_time);

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
    $sql_check = "SELECT * FROM `work_time` WHERE `wt_date`='$date' AND `std_id`='$std_id' ";
    $query_check = mysqli_query($conn, $sql_check);
    $check_count = mysqli_num_rows($query_check);

    if($check_count == 1) {
      echo "
        <script>
          Swal.fire({
            type: 'warning',
            title: 'กรุณาตรวจสอบ',
            text: 'วันที่นี้ได้มีการบันทึกข้อมูลแล้ว กรุณาตรวจสอบอีกครั้ง'
          });
        </script>
      ";
    } else {
      $timeDiff = TimeDiff($come_time, $out_time);
      $sql = "INSERT INTO `work_time` (`wt_in_time`, `wt_out_time`, `wt_date`, `std_id`, `wt_total`,`lat`, `lng`)
              VALUES ('$come_time', '$out_time', '$date', '$std_id', '$timeDiff','$lat','$lng')";
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
}

function TimeDiff($time1,$time2){
  return (strtotime($time2) - strtotime($time1))/  ( 60 * 60 ); // 1 Hour =  60*60
}

mysqli_close($conn);

?>
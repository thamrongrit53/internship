<?php

include "./config/connect.php";
session_start();
$rename = time() . ".jpg";
$std_id = $_SESSION["std_id"];
$lev_date = $_POST["lev_date"];
$lev_type = $_POST["lev_type"];
$lev_first_day = $_POST["lev_first_day"];
$lev_last_day = $_POST["lev_last_day"];
$lev_sum_day = $_POST["lev_sum_day"];
$lev_reason = $_POST["lev_reason"];
$image = $rename;
$target="images/".$image;

if(empty($std_id) || empty($lev_date) || empty($lev_type) || empty($lev_first_day) ||
  empty($lev_last_day) || empty($lev_sum_day) || empty($lev_reason) || empty($image)
) {
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
  $first = new DateTime($lev_first_day);
  $last = new DateTime($lev_last_day);

  if($first > $last) {
    echo "
      <script>
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'วันที่ ไม่สมเหตุสมผลกัน กรุณาตรวจสอบใหม่อีกครั้ง'
        });
      </script>
    ";
  } else {
    $sql = "INSERT INTO `leaves` (`lev_date`, `lev_type`, `lev_reason`, `lev_first_day`, 
          `lev_last_day`, `lev_sum_day`, `lev_attachment`, `lev_approved`, `std_id`)
          VALUES ('$lev_date','$lev_type','$lev_reason','$lev_first_day',
          '$lev_last_day','$lev_sum_day','$image','0','$std_id')";
    $query = mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
    if($query) {
      echo "
        <script>
          Swal.fire({
            type: 'success',
            title: 'สำเร็จ',
            text: 'บันทึกข้อมูลสำเร็จ'
          });
          setTimeout(() => {
            window.location.href = 'index.php?page=leaves';      
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
mysqli_close($conn);

?>
<?php

include "./config/connect.php";
session_start();

$std_id = $_SESSION["std_id"];
$old_pass = $_POST["old_pass"];
$std_pass = $_POST["std_pass"];
$re_std_pass = $_POST["re_std_pass"];

if(empty($old_pass) || empty($std_pass) || empty($re_std_pass)) {
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
  if(strlen($std_pass) < 8) {
    echo "
      <script>
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'รหัสผ่านควรมีความยาวไม่น้อยกว่า 8 ตัวอักษร'
        });
      </script>
    ";
  } else if($std_pass != $re_std_pass) {
    echo "
      <script>
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบใหม่อีกครั้ง'
        });
      </script>
    ";
  } else {
    $std_password = md5($std_pass);

    $sql = "SELECT std_password FROM `student` WHERE `std_id`='$std_id' ";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);

    $old_password = $result["std_password"];

    if(md5($old_pass) != $old_password) {
      echo "
        <script>
          Swal.fire({
            type: 'warning',
            title: 'กรุณาตรวจสอบ',
            text: 'รหัสผ่านเดิมไม่ถูกต้อง กรุณาตรวจสอบใหม่อีกครั้ง'
          });
        </script>
      ";
    } else {
      $update_sql = "UPDATE `student` SET `std_password`='$std_password' WHERE `std_id`='$std_id' ";
      $update_query = mysqli_query($conn, $update_sql);

      if($update_query) {
        echo "
          <script>
            Swal.fire({
              type: 'success',
              title: 'สำเร็จ',
              text: 'บันทึกข้อมูลสำเร็จ'
            });
            setTimeout(() => {
              window.location.href = 'index.php?page=dashboard';      
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
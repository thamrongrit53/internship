<?php

include "./config/connect.php";
session_start();

$username = $_POST["username"];
$password = md5($_POST["password"]);

if(empty($username) || empty($password)) {
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
  $inyr_q = "SELECT * FROM `intern_year` ORDER BY inyr_id DESC LIMIT 0,1 ";
  $run_inyr = mysqli_query($conn, $inyr_q);
  $inyr = mysqli_fetch_array($run_inyr);
  $chk_inyr_id = $inyr["inyr_id"];

  $sql = "SELECT * FROM `student` WHERE `std_id`='$username' AND `std_password`='$password' AND `inyr_id`='$chk_inyr_id' ";
  $query = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($query);

  if($count == 1) {
    $row = mysqli_fetch_array($query);

    $_SESSION["std_id"] = $row["std_id"];
    $_SESSION["std_photo"] = $row["std_photo"];
    $std_id = $_SESSION["std_id"];
    session_write_close();
    
    $img_query = "SELECT comp_map, comp_chart FROM company WHERE std_id = '$std_id' ";
    $img_run_q = mysqli_query($conn, $img_query);
    $img = mysqli_fetch_array($img_run_q);
    if($row["std_photo"] == "0" || $img["comp_map"] == "0" || $img["comp_chart"] == "0") {
      echo "<script>window.location.href = 'index.php?page=register_upload';</script>";
      exit();
    } else {
      echo "
        <script>
          window.location.href = 'index.php?page=dashboard';
        </script>
      ";
    }
  } else {
    echo "
      <script>
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบใหม่อีกครั้ง'
        });
      </script>
    ";
  }
}
mysqli_close($conn);

?>
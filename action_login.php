<?php

include "./config/connect.php";
session_start();

$user=$_SESSION["std_id"];
$pass=$_SESSION["password"];

if(empty($user) || empty($pass)) {
  echo "
        <script>
          window.location.href = 'https://www.sbac.online/event/login.php';
        </script>
      ";
} else {
  $inyr_q = "SELECT * FROM `intern_year` ORDER BY inyr_id DESC LIMIT 0,1 ";
  $run_inyr = mysqli_query($conn, $inyr_q);
  $inyr = mysqli_fetch_array($run_inyr);
  $chk_inyr_id = $inyr["inyr_id"];

  $sql = "SELECT * FROM `student` WHERE `std_id`='$user' AND `std_password`='$pass' AND `inyr_id`='$chk_inyr_id' ";
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
          window.location.href = 'register.php';
        </script>
    ";
  }
}
mysqli_close($conn);

?>
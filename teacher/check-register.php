<?php

  include "connect.php";
  
  $f_name = $_POST["f_name"];
  $l_name = $_POST["l_name"];
  $email = $_POST["email"];
  $tel = $_POST["tel"];
  $pass = $_POST["pass"];
  $conf_pass = $_POST["conf_pass"];

  $nameValidation = "/^[a-zA-Zก-๏\s]+$/";
  $emailValidation = "/^[_a-z0-9]+(\.[a-z0-9-])*@[a-z0-9]+(\.[a-z]{2,4})$/";
  $telValidation = "/^[0]+[0-9]+$/";

  if(empty($f_name) || empty($l_name) || empty($email) || empty($tel) || empty($pass) || empty($conf_pass)) {

    echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน');</script>";
    echo "<meta http-equiv=\"refresh\"content=\"0;URL=register.php\">\n";

  } else {

    if(!preg_match($nameValidation, $f_name)) {
      echo "<script>alert('กรุณากรอกข้อมูลให้ถูกต้อง ใช้ได้เฉพาะตัวอักษร A-Z หรือ a-z');</script>";
      echo "<meta http-equiv=\"refresh\"content=\"0;URL=register.php\">\n";
    }

    if(!preg_match($nameValidation, $l_name)) {
      echo "<script>alert('กรุณากรอกข้อมูลให้ถูกต้อง ใช้ได้เฉพาะตัวอักษร A-Z หรือ a-z');</script>";
      echo "<meta http-equiv=\"refresh\"content=\"0;URL=register.php\">\n";
    }

    if(!preg_match($emailValidation, $email)) {
      echo "<script>alert('กรุณากรอกข้อมูลให้ถูกต้อง เช่น example@exam.com');</script>";
      echo "<meta http-equiv=\"refresh\"content=\"0;URL=register.php\">\n";
    }

    if(!preg_match($telValidation, $tel) || strlen($tel) < 10) {
      echo "<script>alert('กรุณากรอกข้อมูลให้ถูกต้อง ใช้เฉพาะตัวเลข 0-9 ไม่เกิน 10 หลัก');</script>";
      echo "<meta http-equiv=\"refresh\"content=\"0;URL=register.php\">\n";
    }

    if(strlen($pass) < 8 || strlen($pass) > 20) {
      echo "<script>alert('กรุณาใช้ Password ที่มีความยาวไม่ต่ำกว่า 8 ตัวอักษร แต่ไม่เกิน 20 ตัวอักษร');</script>";
      echo "<meta http-equiv=\"refresh\"content=\"0;URL=register.php\">\n";
    }

    if($pass !== $conf_pass) {
      echo "<script>alert('Password ไม่ตรงกัน กรุณายืนยัน Password อีกครั้ง');</script>";
      echo "<meta http-equiv=\"refresh\"content=\"0;URL=register.php\">\n";
    }

    $sql = "SELECT * FROM `teacher` WHERE `th_email` = '$email' LIMIT 1";
    $check_query = mysqli_query($conn, $sql);
    $count_mail = mysqli_num_rows($check_query);

    if($count_mail > 0) {
      echo "<script>alert('E-mail นี้ได้ถูกลงทะเบียนแล้ว โปรดใช้ E-mail อื่น');</script>";
      echo "<meta http-equiv=\"refresh\"content=\"0;URL=register.php\">\n";
    } else {
      $pass = md5($_POST["pass"]);
      $sql="INSERT INTO teacher ( `th_fname`, `th_lname`, `th_email`, `th_pass`, `th_tel`)VALUES('$f_name','$l_name','$email','$pass','$tel')";

      $query = mysqli_query($conn, $sql);

      if($query) {
        echo "<script>alert('สมัครสมาชิกสำเร็จ');</script>";
        echo "<meta http-equiv=\"refresh\"content=\"0;URL=login.php\">\n";
       }
       else {
        echo "<script>alert('เกิดข้อผิดพลาดในการสมัครสมาชิก');</script>";
        echo "<meta http-equiv=\"refresh\"content=\"0;URL=register.php\">\n";
       }
    }

  }

  mysqli_close($conn);
?>
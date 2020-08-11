<?php

include "./config/connect.php";
session_start();

$std_id = $_SESSION["std_id"];
$les_date = $_POST["date"];
$led_issue = $_POST["led_issue"];
$led_exp = $_POST["led_exp"];
$led_solve = $_POST["led_solve"];
$ans1 = $_POST["ans1"];
$ans2 = $_POST["ans2"];
$ans3 = $_POST["ans3"];
$ans4 = $_POST["ans4"];
$ans5 = $_POST["ans5"];
$ans6 = $_POST["ans6"];

if(empty($ans1) && empty($ans2) && empty($ans3) && empty($ans4) && empty($ans5) && empty($ans6)){
  echo "
    <script>
      Swal.fire({
        type: 'warning',
        title: 'กรุณาตรวจสอบ',
        text: 'เลือดตอบอย่างน้อย 1 ข้อ กรุณาตรวจสอบใหม่อีกครั้ง'
      });
    </script>
  ";
} else if(empty($les_date)) {
  echo "
    <script>
      Swal.fire({
        type: 'warning',
        title: 'กรุณาตรวจสอบ',
        text: 'กรุณาระบุวันที่ กรุณาตรวจสอบใหม่อีกครั้ง'
      });
    </script>
  ";
} else if(empty($led_issue) || empty($led_exp) || empty($led_solve)){
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
  $sql = "UPDATE `lesson_learn_detail` SET `led_issue`='$led_issue', `led_exp`='$led_exp', `led_solve`='$led_solve'
          WHERE `led_date`='$les_date' AND `std_id`='$std_id' ";
  $query = mysqli_query($conn, $sql);
    
  if(!empty($ans1)) {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='$ans1'
            WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='1' ";
    $query = mysqli_query($conn, $sql);
  } else {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='0'
           WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='1' ";
    $query = mysqli_query($conn, $sql);
  }

  if(!empty($ans2)) {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='$ans2'
            WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='2' ";
    $query = mysqli_query($conn, $sql);
  } else {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='0'
           WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='2' ";
    $query = mysqli_query($conn, $sql);
  }

  if(!empty($ans3)) {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='$ans3'
            WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='3' ";
     $query = mysqli_query($conn, $sql);
   } else {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='0'
           WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='3' ";
     $query = mysqli_query($conn, $sql);
   }

  if(!empty($ans4)) {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='$ans4'
            WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='4' ";
    $query = mysqli_query($conn, $sql);
  } else {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='0'
           WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='4' ";
    $query = mysqli_query($conn, $sql);
  }

  if(!empty($ans5)) {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='$ans5'
            WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='5' ";
    $query = mysqli_query($conn, $sql);
  } else {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='0'
           WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='5' ";
    $query = mysqli_query($conn, $sql);
  }

  if(!empty($ans6)) {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='$ans6'
            WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='6' ";
    $query = mysqli_query($conn, $sql);
  } else {
    $sql = "UPDATE `lesson_learn_ans` SET `ans_result`='0'
            WHERE `les_date`='$les_date' AND `std_id`='$std_id' AND `les_id`='6' ";
    $query = mysqli_query($conn, $sql);
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
          window.location.href = 'index.php?page=lesson_learn';      
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

mysqli_close($conn);
?>
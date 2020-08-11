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
  $sql_check = "SELECT * FROM `lesson_learn_ans` WHERE `les_date`='$les_date' AND `std_id`='$std_id' ";
  $query_check = mysqli_query($conn, $sql_check);
  $check_count = mysqli_num_rows($query_check);

  if($check_count > 1) {
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
    $sql = "INSERT INTO `lesson_learn_detail`(`led_date`, `led_issue`, `led_exp`, `led_solve`, `std_id`) 
            VALUES ('$les_date', '$led_issue', '$led_exp', '$led_solve', '$std_id')";
    $query = mysqli_query($conn, $sql);
    
    if(!empty($ans1)) {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('1', '$ans1', '$les_date', '$std_id') ";
      $query = mysqli_query($conn, $sql);
    } else {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('1', '0', '$les_date', '$std_id') ";
      $query = mysqli_query($conn, $sql);
    }

    if(!empty($ans2)) {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('2', '$ans2', '$les_date', '$std_id') ";
      $query = mysqli_query($conn, $sql);
    } else {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('2', '0', '$les_date', '$std_id') ";
      $query = mysqli_query($conn, $sql);
    }

    if(!empty($ans3)) {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('3', '$ans3', '$les_date', '$std_id') ";
      $query = mysqli_query($conn, $sql);
    } else {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('3', '0', '$les_date', '$std_id') ";
      $query = mysqli_query($conn, $sql);
    }

    if(!empty($ans4)) {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('4', '$ans4', '$les_date', '$std_id') ";
      $query = mysqli_query($conn, $sql);
    } else {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('4', '0', '$les_date', '$std_id') ";
      $query = mysqli_query($conn, $sql);
    }

    if(!empty($ans5)) {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('5', '$ans5', '$les_date', '$std_id') ";
      $query = mysqli_query($conn, $sql);
    } else {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('5', '0', '$les_date', '$std_id') ";
      $query = mysqli_query($conn, $sql);
    }

    if(!empty($ans6)) {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('6', '$ans6', '$les_date', '$std_id') ";
      $query = mysqli_query($conn, $sql);
    } else {
      $sql = "INSERT INTO `lesson_learn_ans` (`les_id`, `ans_result`, `les_date`, `std_id`)
              VALUES ('6', '0', '$les_date', '$std_id') ";
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
}
mysqli_close($conn);
?>
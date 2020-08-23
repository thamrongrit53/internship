<?php
session_start();

include "./config/connect.php";

$user=$_SESSION["std_id"];
$pass=$_SESSION["password"];
//เก็บlocation
$lat=$_POST["let"];
$lng=$_POST["lng"];

$std_id = $user;
$std_prefix = $_POST["std_prefix"];
$std_fname = $_POST["std_fname"];
$std_lname = $_POST["std_lname"];
$inyr_id = $_POST["inyr_id"];
$std_class = $_POST["std_class"];
$branch_id = $_POST["branch_id"];
$std_address_num = $_POST["std_address_num"];
$std_swine = $_POST["std_swine"];
$std_road = $_POST["std_road"];
$std_canton = $_POST["std_canton"];
$std_district = $_POST["std_district"];
$std_province = $_POST["std_province"];
$std_zipcode = $_POST["std_zipcode"];
$std_tel = $_POST["std_tel"];
$std_disease = $_POST["std_disease"];
$std_blood_type = $_POST["std_blood_type"];
// $std_photo = $_POST["std_photo"];
$std_pass = $pass;
$re_std_pass =$pass;

$intd_start_date = $_POST["intd_start_date"];
$intd_end_date = $_POST["intd_end_date"];
$intd_start_time = $_POST["intd_start_time"];
$intd_end_time = $_POST["intd_end_time"];

$comp_name = $_POST["comp_name"];
$comp_address_num = $_POST["comp_address_num"];
$comp_swine = $_POST["comp_swine"];
$comp_road = $_POST["comp_road"];
$comp_canton = $_POST["comp_canton"];
$comp_district = $_POST["comp_district"];
$comp_province = $_POST["comp_province"];
$comp_zipcode = $_POST["comp_zipcode"];
$comp_tel = $_POST["comp_tel"];
$comp_fax = $_POST["comp_fax"];
// $comp_map = $_POST["comp_map"];
// $comp_chart = $_POST["comp_chart"];

$parent_name = $_POST["parent_name"];
$parent_related = $_POST["parent_related"];
$parent_address_num = $_POST["parent_address_num"];
$parent_swine = $_POST["parent_swine"];
$parent_road = $_POST["parent_road"];
$parent_canton = $_POST["parent_canton"];
$parent_district = $_POST["parent_district"];
$parent_province = $_POST["parent_province"];
$parent_zipcode = $_POST["parent_zipcode"];
$parent_tel = $_POST["parent_tel"];

$emer_name = $_POST["emer_name"];
$emer_address_num = $_POST["emer_address_num"];
$emer_swine = $_POST["emer_swine"];
$emer_road = $_POST["emer_road"];
$emer_canton = $_POST["emer_canton"];
$emer_district = $_POST["emer_district"];
$emer_province = $_POST["emer_province"];
$emer_zipcode = $_POST["emer_zipcode"];
$emer_tel = $_POST["emer_tel"];

$nameValidation = "/^[a-zA-Zก-๏\s]+$/";
$numberValidation = "/^[0-9]$/";

if (
  empty($std_id)          || empty($std_prefix)       || empty($std_fname)          ||
  empty($std_lname)       || empty($std_class)        || empty($branch_id)          ||
  empty($std_address_num) || empty($std_swine)        || empty($std_road)           ||
  empty($std_canton)      || empty($std_district)     || empty($std_province)       ||
  empty($std_zipcode)     || empty($std_tel)          || empty($std_disease)        ||
  empty($std_blood_type)  || empty($intd_start_date)  || empty($intd_end_date)      || 
  empty($intd_start_time) || empty($intd_end_time)    || empty($comp_name)          || 
  empty($comp_address_num)|| empty($comp_swine)       || empty($comp_road)          || 
  empty($comp_canton)     || empty($comp_district)    || empty($comp_province)      || 
  empty($comp_zipcode)    || empty($comp_tel)         || empty($comp_fax)           || 
  empty($parent_name)     || empty($parent_related)   || empty($parent_address_num) ||
  empty($parent_swine)    || empty($parent_road)      || empty($parent_canton)      ||
  empty($parent_district) || empty($parent_province)  || empty($parent_zipcode)     ||
  empty($parent_tel)      || empty($emer_name)        || empty($emer_address_num)   ||
  empty($emer_swine)      || empty($emer_road)        || empty($emer_canton)        ||
  empty($emer_district)   || empty($emer_province)    || empty($emer_zipcode)       || 
  empty($emer_tel)        || empty($std_pass)         || empty($re_std_pass)        
) { 
  // echo "
  //   <script>
  //     Swal.fire({
  //       type: 'warning',
  //       title: 'กรุณาตรวจสอบ',
  //       text: 'ข้อมูลไม่ครบถ้วน กรุณาตรวจสอบใหม่อีกครั้ง'
  //     });
  //   </script>
  // ";
} else {

  if( 
    !preg_match($nameValidation, $std_fname)    || !preg_match($nameValidation, $std_lname) || 
    !preg_match($nameValidation, $parent_name)  || !preg_match($nameValidation, $emer_name)
  ) {
    echo "
      <script>
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'กรอกข้อมูลชื่อไม่ถูกต้อง (เฉพาะตัวอักษร เท่านั้น) กรุณาตรวจสอบใหม่อีกครั้ง'
        });
      </script>
    ";
  }

  // if(!preg_match($numberValidation, $std_tel)) {
  //   echo "
  //     <script>
  //       Swal.fire({
  //         type: 'warning',
  //         title: 'กรุณาตรวจสอบ',
  //         text: 'กรอกข้อมูลชื่อไม่ถูกต้อง (เฉพาะตัวอักษร เท่านั้น) กรุณาตรวจสอบใหม่อีกครั้ง'
  //       });
  //     </script>
  //   ";
  // }
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
  }

  if($std_pass != $re_std_pass) {
    echo "
      <script>
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบใหม่อีกครั้ง'
        });
      </script>
    ";
  }

  $sql = "SELECT `std_id` FROM `student` WHERE `std_id`='$std_id' AND `inyr_id`='$inyr_id' LIMIT 1";
  $check_query = mysqli_query($conn, $sql);
  $count_num = mysqli_num_rows($check_query);

  if($count_num > 0) {
    echo "
      <script>
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'รหัสนักศึกษานี้ ได้มีการลงทะเบียนเรียบร้อยแล้ว กรุณาตรวจสอบใหม่อีกครั้ง'
        });
      </script>
    ";
    exit();
  } else {
    $std_password = $std_pass;

    $sql_std = "INSERT INTO 
      `student` (`std_id`, `std_prefix`, `std_fname`, `std_lname`, `std_class`, `branch_id`, 
      `std_address_num`, `std_swine`, `std_road`, `std_canton`, `std_district`, `std_province`, 
      `std_zipcode`, `std_tel`, `std_disease`, `std_blood_type`, `std_password`, `inyr_id`,`lat`,`lng`)
      VALUES ('$std_id', '$std_prefix', '$std_fname', '$std_lname', '$std_class', '$branch_id', 
      '$std_address_num', '$std_swine', '$std_road', '$std_canton', '$std_district', '$std_province', 
      '$std_zipcode', '$std_tel', '$std_disease', '$std_blood_type', '$std_password', '$inyr_id','$lat','$lng')
    ";


    $sql_comp = "INSERT INTO 
      `company` (`comp_name`, `comp_address_num`, `comp_swine`, `comp_road`, `comp_canton`, `comp_district`, 
      `comp_province`, `comp_zipcode`, `comp_tel`, `comp_fax`, `std_id`) 
      VALUES ('$comp_name', '$comp_address_num', '$comp_swine', '$comp_road', '$comp_canton', '$comp_district', 
      '$comp_province', '$comp_zipcode', '$comp_tel', '$comp_fax', '$std_id')
    ";


    $sql_parent = "INSERT INTO 
      `parent` (`parent_name`, `parent_related`, `parent_address_num`, `parent_swine`, `parent_road`, 
      `parent_canton`, `parent_district`, `parent_province`, `parent_zipcode`, `parent_tel`, `std_id`) 
      VALUES ('$parent_name', '$parent_related', '$parent_address_num', '$parent_swine', '$parent_road', 
      '$parent_canton', '$parent_district', '$parent_province', '$parent_zipcode', '$parent_tel', '$std_id')
    ";

    $sql_emer = "INSERT INTO 
      `emergency` (`emer_name`, `emer_address_num`, `emer_swine`, `emer_road`, `emer_canton`, 
      `emer_district`, `emer_province`, `emer_zipcode`, `emer_tel`, `std_id`) 
      VALUES ('$emer_name', '$emer_address_num', '$emer_swine', '$emer_road', '$emer_canton', 
      '$emer_district', '$emer_province', '$emer_zipcode', '$emer_tel', '$std_id')
    ";


    $sql_intd = "INSERT INTO 
      `internship_detail` (`std_id`, `intd_start_date`, `intd_end_date`, `intd_start_time`, `intd_end_time`) 
      VALUES ('$std_id', '$intd_start_date', '$intd_end_date', '$intd_start_time', '$intd_end_time')
    ";
    
    $query_std = mysqli_query($conn, $sql_std);
    $query_comp = mysqli_query($conn, $sql_comp);
    $query_parent = mysqli_query($conn, $sql_parent);
    $query_emer = mysqli_query($conn, $sql_emer);
    $query_intd = mysqli_query($conn, $sql_intd);


    if($query_std && $query_comp && $query_parent && $query_emer && $query_intd) {
      echo "
        <script>
          Swal.fire({
            type: 'success',
            title: 'สำเร็จ',
            text: 'บันทึกข้อมูลสำเร็จ'
          });
          setTimeout(() => {
            window.location.href = 'index.php';      
          }, 1000);
        </script>
      ";
    } else {
      // echo "
      //   <script>
      //     Swal.fire({
      //       type: 'error',
      //       title: 'ข้อผิดพลาด',
      //       text: 'เกิดข้อผิดพลาด กรุณาตรวจสอบอีกครั้ง'
      //     });
      //   </script>
      // ";
    }
  }
}
mysqli_close($conn);

?>


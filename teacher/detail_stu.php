<?php 
session_start();
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

</head>

<body id="page-top" style="font-family: 'Kanit', sans-serif;">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html"><img src="img/sbac.jpg" style="width: 30px"> Internship-System SBAC</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="ค้นหา" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
   <ul class="navbar-nav ml-auto ml-md-0">
  
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div aria-labelledby="messagesDropdown">
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>หน้าแรก</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="Record_internship.php">
          <i class="fas fa-fw fa-table"></i>
          <span>บันทึกฝึกงานนักศึกษา</span></a>
      </li>
       
      
      <li class="nav-item ">
        <a class="nav-link" href="InternshipTime.php">
          <i class="fas fa-fw fa-table"></i>
          <span>บันทึกเวลาฝึกงาน</span></a>
      </li>
          <li class="nav-item ">
        <a class="nav-link" href="InternshipTime_out.php">
          <i class="fas fa-fw fa-table"></i>
          <span>บันทึกการฝึกงานภายนอก</span></a>
      </li>
          <li class="nav-item ">
        <a class="nav-link" href="Lesson.php">
             <i class="fas fa-fw fa-chart-area"></i>
          <span>Lesson Learn</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="studentinternship.php">
             <i class="fas fa-fw fa-table"></i>
          <span>ข้อมูลนักศึกษาฝึกงาน</span></a>
      </li>
    </ul>


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">ข้อมูล</a>
          </li>
          <li class="breadcrumb-item active">นักศึกษา</li>
        </ol>

        <!-- DataTables Example -->
        <?php
ini_set('display_errors', 1);
error_reporting(~0);
$strid_sid = null;
if (isset($_GET["id"])) {
  $strid_sid = $_GET["id"];
}

// $sql = "SELECT student.*,branch.*,internship_detail.*,company.*,parent.*,emergency.* FROM student,branch,internship_detail,company,parent,emergency 
// WHERE student.branch_id = branch.branch_id 
// AND internship_detail.std_id = '".$strid_sid."' 
// AND company.std_id = '".$strid_sid."'
// AND parent.std_id='".$strid_sid."'
// AND student.std_id ='".$strid_sid."'
// AND emergency.std_id='".$strid_sid."'
// AND student.std_id = '".$strid_sid."' ";

 $sql = "SELECT student.*,branch.*,internship_detail.* FROM student,branch,internship_detail
  WHERE student.branch_id = branch.branch_id
  AND internship_detail.std_id = '".$strid_sid."'
   AND student.std_id ='".$strid_sid."'";
$query = mysqli_query($conn,$sql);

while ($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
?>
          <div class="card-body">
          <div class="card">
            <div class="card-header">
              ข้อมูลส่วนตัว
            </div>
            <div class="card-body">
              <form action="#" class="was-validated">
                <div class="form-group">
                  <div class="row">
      
                    <div class="col-md-2">
                      <label for="prefix">คำนำหน้า</label>
                      <input type="text" class="form-control" id="prefix" placeholder="" name="prefix" value="<?php echo $result["std_prefix"];?>" required>
                    </div>
                    <div class="col-md-5">
                      <label for="fname">ชื่อ:</label>
                      <input type="text" class="form-control" id="fname" placeholder="ชื่อจริง" name="fname" value="<?php echo $result["std_fname"];?>"required>
                    </div>
                    <div class="col-md-5">
                      <label for="lname">นามสกุล:</label>
                      <input type="text" class="form-control" id="fname" placeholder="นามสกุล" name="lname" value="<?php echo $result["std_lname"];?>"required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="id">รหัสประจำตัว:</label>
                      <input type="text" class="form-control" id="uname" placeholder="รหัสประจำตัว" name="id" value="<?php echo $result["std_id"];?>" required>
                    </div>
                    <div class="col-md-4">
                      <label for="class">ระดับชั้น:</label>
                      <input type="text" class="form-control" id="class" placeholder="ระดับชั้น" name="class" value="<?php echo $result["std_class"];?>"required>
                    </div>
                    <div class="col-md-4">
                      <label for="branch">สาขาวิชา:</label>
                      <input type="text" class="form-control" id="branch" placeholder="สาขาวิชา" name="branch" value="<?php echo $result["branch_name"];?>"required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="uname">เริ่มฝึกงานวันที่:</label>
                      <input type="date" class="form-control" id="start_date" placeholder="" name="intd_end_date" value="<?php echo $result["intd_start_date"];?>" required>
                    </div>
                    <div class="col-md-6">
                      <label for="uname">สิ้นสุดวันที่:</label>
                      <input type="date" class="form-control" id="start_date" placeholder="" name="intd_end_date"value="<?php echo $result["intd_end_date"];?>" required>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-6">
                      <label for="uname">latitude:</label>
                      <input type="text" class="form-control" id="latitude" placeholder="" name="latitude" value="<?php echo $result["lat"];?>" required>
                    </div>
                    <div class="col-md-6">
                      <label for="uname">longitude:</label>
                      <input type="text" class="form-control" id="longitude" placeholder="" name="longitude"value="<?php echo $result["lng"];?>" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">

                      <label for="uname">รูปถ่ายนักศึกษาฝึกงาน:</label>
                      <div class="custom-file mb-3">
                      <img src='../images/students/<?php echo $result["std_photo"]; ?>' id="img" class="img-thumbnail" style="width:200px;">
                      <br>
                      <br>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <?php 
          }

            ?>
<!--  --->
<?php 
$sql1 = "SELECT student.*,branch.*,company.* FROM student,branch,company
  WHERE student.branch_id = branch.branch_id
  AND company.std_id = '".$strid_sid."'
   AND student.std_id ='".$strid_sid."'";
$query1 = mysqli_query($conn,$sql1);

while ($result1=mysqli_fetch_array($query1,MYSQLI_ASSOC)) {
?>

<div class="card">
            <div class="card-header">
              ข้อมูลสถานประกอบการ
            </div>
            <div class="card-body">
              <form action="#" class="was-validated">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="comp_name">ชื่อ:</label>
                      <input type="text" class="form-control" id="comp_name" placeholder="ชื่อสถานประกอบการ" name="comp_name"value="<?php echo $result1["comp_name"];?>" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <label for="comp_address_num">ที่อยู่เลขที่:</label>
                      <input type="text" class="form-control" id="comp_address_num" placeholder="ที่อยู่เลขที่" name="comp_address_num" value="<?php echo $result1["comp_address_num"];?>"required>
                    </div>
                    <div class="col-md-5">
                      <label for="comp_swine">หมู่:</label>
                      <input type="text" class="form-control" id="comp_swine" placeholder="หมู่" name="comp_swine" value="<?php echo $result1["comp_swine"];?>"required>
                    </div>
                    <div class="col-md-5">
                      <label for="comp_road">ซอย/ถนน:</label>
                      <input type="text" class="form-control" id="comp_road" placeholder="ซอย/ถนน" name="comp_road"value="<?php echo $result1["comp_road"];?>" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="comp_canton">ตำบล:</label>
                      <input type="text" class="form-control" id="comp_canton" placeholder="ตำบล" name="comp_canton" value="<?php echo $result1["comp_canton"];?>"required>
                    </div>
                    <div class="col-md-4">
                      <label for="comp_district">อำเภอ:</label>
                      <input type="text" class="form-control" id="comp_district" placeholder="อำเภอ" name="comp_district" value="<?php echo $result1["comp_district"];?>"required>
                    </div>
                    <div class="col-md-4">
                      <label for="comp_province">จังหวัด:</label>
                      <input type="text" class="form-control" id="comp_province" placeholder="จังหวัด" name="comp_province"value="<?php echo $result1["comp_province"];?>" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="comp_zipcode">รหัสไปรษณีย์:</label>
                      <input type="text" class="form-control" id="comp_zipcode" placeholder="รหัสไปรษณีย์" name="comp_zipcode" value="<?php echo $result1["comp_zipcode"];?>"required>
                    </div>
                    <div class="col-md-4">
                      <label for="comp_tel">โทรศัพท์:</label>
                      <input type="text" class="form-control" id="comp_tel" placeholder="โทรศัพท์" name="comp_tel"value="<?php echo $result1["comp_tel"];?>" required>
                    </div>
                    <div class="col-md-4">
                      <label for="comp_fax">โทรสาร:</label>
                      <input type="text" class="form-control" id="comp_fax" placeholder="โทรสาร" name="comp_fax" value="<?php echo $result1["comp_fax"];?>"required>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
<!--  --->
<?php 
}
?>

<?php 
$sql2 = "SELECT student.*,branch.* FROM student,branch
  WHERE student.branch_id = branch.branch_id
   AND student.std_id ='".$strid_sid."'";
$query2 = mysqli_query($conn,$sql2);

while ($result2=mysqli_fetch_array($query2,MYSQLI_ASSOC)) {
?>

<div class="card">
            <div class="card-header">
              ข้อมูลทั่วไปนักศึกษา
            </div>
            <div class="card-body">
              <form action="#" class="was-validated">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <p><strong>ที่อยู่ขณะฝึกงาน</strong></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <label for="std_address_num">ที่อยู่เลขที่:</label>
                      <input type="text" class="form-control" id="std_address_num" placeholder="ที่อยู่เลขที่" name="std_address_num" value="<?php echo $result2["std_address_num"];?>"required>
                    </div>
                    <div class="col-md-5">
                      <label for="std_swine">หมู่:</label>
                      <input type="text" class="form-control" id="std_swine" placeholder="หมู่" name="std_swine" value="<?php echo $result2["std_swine"];?>"required>
                    </div>
                    <div class="col-md-5">
                      <label for="std_road">ซอย/ถนน:</label>
                      <input type="text" class="form-control" id="std_road" placeholder="ซอย/ถนน" name="std_road"value="<?php echo $result2["std_road"];?>" required>   
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="std_canton">ตำบล:</label>
                      <input type="text" class="form-control" id="std_canton" placeholder="ตำบล" name="std_canton"value="<?php echo $result2["std_canton"];?>" required>
                    </div>
                    <div class="col-md-4">
                      <label for="std_district">อำเภอ:</label>
                      <input type="text" class="form-control" id="std_district" placeholder="อำเภอ" name="std_district"value="<?php echo $result2["std_district"];?>" required>
                    </div>
                    <div class="col-md-4">
                      <label for="std_province">จังหวัด:</label>
                      <input type="text" class="form-control" id="std_province" placeholder="จังหวัด" name="std_province"value="<?php echo $result2["std_province"];?>" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="std_zipcode">รหัสไปรษณีย์:</label>
                      <input type="text" class="form-control" id="std_zipcode" placeholder="รหัสไปรษณีย์" name="std_zipcode"value="<?php echo $result2["std_zipcode"];?>" required>
                    </div>
                    <div class="col-md-6">
                      <label for="std_tel">โทรศัพท์:</label>
                      <input type="text" class="form-control" id="std_tel" placeholder="โทรศัพท์" name="std_tel"value="<?php echo $result2["std_tel"];?>" required>
                    </div>
                  </div>                  
                </div>
                <hr>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <p><strong>โรคประจำตัว</strong></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="std_disease">ระบุโรคประจำตัว:</label>
                      <input type="text" class="form-control" id="std_disease" placeholder="โรคประจำตัว" name="std_disease" value="<?php echo $result2["std_disease"];?>"required>
                    </div>
                    <div class="col-md-6">
                      <label for="std_blood_type">กลุ่มเลือด:</label>
                      <input type="text" class="form-control" id="std_blood_type" placeholder="โรคประจำตัว" name="std_blood_type" value="<?php echo $result2["std_blood_type"];?>"required>
                    </div>
                  </div>
                </div>
              
              <?php 
                }
                ?>
<?php 
$sql3 = "SELECT student.*,branch.*,parent.* FROM student,branch,parent
  WHERE student.branch_id = branch.branch_id
  AND parent.std_id = '".$strid_sid."'
   AND student.std_id ='".$strid_sid."'";
$query3 = mysqli_query($conn,$sql3);

while ($result3=mysqli_fetch_array($query3,MYSQLI_ASSOC)) {
?>

    <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <p><strong>ผู้ปกครอง</strong></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="parent_name">ชื่อ - สกุล:</label>
                      <input type="text" class="form-control" id="parent_name" placeholder="ชื่อ - สกุล ผู้ปกครอง" name="parent_name"value="<?php echo $result3["parent_name"];?>" required>
                    </div>
                    <div class="col-md-6">
                      <label for="parent_related">เกี่ยวข้องเป็น:</label>
                      <input type="text" class="form-control" id="parent_related" placeholder="เกี่ยวข้องเป็น" name="parent_related" value="<?php echo $result3["parent_related"];?>"required>  
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <label for="parent_address_num">ที่อยู่เลขที่:</label>
                      <input type="text" class="form-control" id="parent_address_num" placeholder="ที่อยู่เลขที่" name="parent_address_num"value="<?php echo $result3["parent_address_num"];?> "required>
                    </div>
                    <div class="col-md-5">
                      <label for="parent_swine">หมู่:</label>
                      <input type="text" class="form-control" id="parent_swine" placeholder="หมู่" name="parent_swine"value="<?php echo $result3["parent_swine"];?> "required>
                    </div>
                    <div class="col-md-5">
                      <label for="parent_road">ซอย/ถนน:</label>
                      <input type="text" class="form-control" id="parent_road" placeholder="ซอย/ถนน" name="parent_road" value="<?php echo $result3["parent_road"];?>"required>  
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="parent_canton">ตำบล:</label>
                      <input type="text" class="form-control" id="parent_canton" placeholder="ตำบล" name="parent_canton" value="<?php echo $result3["parent_canton"];?>"required>
                    </div>
                    <div class="col-md-4">
                      <label for="parent_district">อำเภอ:</label>
                      <input type="text" class="form-control" id="parent_district" placeholder="อำเภอ" name="parent_district" value="<?php echo $result3["parent_district"];?>"required>
                    </div>
                    <div class="col-md-4">
                      <label for="parent_province">จังหวัด:</label>
                      <input type="text" class="form-control" id="parent_province" placeholder="จังหวัด" name="parent_province"value="<?php echo $result3["parent_province"];?> "required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="parent_zipcode">รหัสไปรษณีย์:</label>
                      <input type="text" class="form-control" id="parent_zipcode" placeholder="รหัสไปรษณีย์" name="parent_zipcode"value="<?php echo $result3["parent_zipcode"];?> "required> 
                    </div>
                    <div class="col-md-6">
                      <label for="parent_tel">โทรศัพท์:</label>
                      <input type="text" class="form-control" id="parent_tel" placeholder="โทรศัพท์" name="parent_tel" value="<?php echo $result3["parent_tel"];?>"required> 
                    </div>
                  </div>                  
                </div>
                <hr>
                <?php 
}
?>
<?php 
$sql4 = "SELECT student.*,branch.*,emergency.* FROM student,branch,emergency
  WHERE student.branch_id = branch.branch_id
  AND emergency.std_id = '".$strid_sid."'
   AND student.std_id ='".$strid_sid."'";
$query4 = mysqli_query($conn,$sql4);

while ($result4=mysqli_fetch_array($query4,MYSQLI_ASSOC)) {
?>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <p><strong>ผู้ติดต่อกรณีฉุกเฉิน</strong></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="emer_name">ชื่อ - สกุล:</label>
                      <input type="text" class="form-control" id="emer_name" placeholder="ชื่อ - สกุล" name="emer_name"value="<?php echo $result4["emer_name"];?> "required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <label for="emer_address_num">ที่อยู่เลขที่:</label>
                      <input type="text" class="form-control" id="emer_address_num" placeholder="ที่อยู่เลขที่" name="emer_address_num" value="<?php echo $result4["emer_address_num"];?>"required>
                    </div>
                    <div class="col-md-5">
                      <label for="emer_swine">หมู่:</label>
                      <input type="text" class="form-control" id="emer_swine" placeholder="หมู่" name="emer_swine" value="<?php echo $result4["emer_swine"];?>"required>
                    </div>
                    <div class="col-md-5">
                      <label for="emer_road">ซอย/ถนน:</label>
                      <input type="text" class="form-control" id="emer_road" placeholder="ซอย/ถนน" name="emer_road" value="<?php echo $result4["emer_road"];?>"required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="emer_canton">ตำบล:</label>
                      <input type="text" class="form-control" id="emer_canton" placeholder="ตำบล" name="emer_canton" value="<?php echo $result4["emer_canton"];?>"required>
                    </div>
                    <div class="col-md-4">
                      <label for="emer_district">อำเภอ:</label>
                      <input type="text" class="form-control" id="emer_district" placeholder="อำเภอ" name="emer_district" value="<?php echo $result4["emer_district"];?>"required>
                    </div>
                    <div class="col-md-4">
                      <label for="emer_province">จังหวัด:</label>
                      <input type="text" class="form-control" id="emer_province" placeholder="จังหวัด" name="emer_province"value="<?php echo $result4["emer_province"];?>" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="emer_zipcode">รหัสไปรษณีย์:</label>
                      <input type="text" class="form-control" id="emer_zipcode" placeholder="รหัสไปรษณีย์" name="emer_zipcode"value="<?php echo $result4["emer_zipcode"];?>" required>
                    </div>
                    <div class="col-md-6">
                      <label for="emer_tel">โทรศัพท์:</label>
                      <input type="text" class="form-control" id="emer_tel" placeholder="โทรศัพท์" name="emer_tel" value="<?php echo $result4["emer_tel"];?>"required>
                    </div>
                  </div>                  
                </div>
                <hr>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                  <!---  <button type="submit" class="btn btn-primary" >SUBMIT</button> -->
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
<?php 
}
?>

        </div>
      </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ต้องการออกจากระบบหรือไม่?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <a class="btn btn-primary" href="login.php">ตกลง</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

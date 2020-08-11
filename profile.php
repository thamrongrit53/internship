<?php

$s_std = "SELECT student.*, branch.branch_name, intern_year.inyr_lable  FROM `student` 
          INNER JOIN `branch` ON student.branch_id = branch.branch_id
          INNER JOIN `intern_year` ON student.inyr_id = intern_year.inyr_id
          WHERE `std_id`='$std_id' LIMIT 1";
$q_std = mysqli_query($conn, $s_std);
$r_std = mysqli_fetch_array($q_std);

$s_comp = "SELECT * FROM `company` WHERE `std_id`='$std_id' LIMIT 1";
$q_comp = mysqli_query($conn, $s_comp);
$r_comp = mysqli_fetch_array($q_comp);

$s_parent = "SELECT * FROM `parent` WHERE `std_id`='$std_id' LIMIT 1";
$q_parent = mysqli_query($conn, $s_parent);
$r_parent = mysqli_fetch_array($q_parent);

$s_emer = "SELECT * FROM `emergency` WHERE `std_id`='$std_id' LIMIT 1";
$q_emer = mysqli_query($conn, $s_emer);
$r_emer = mysqli_fetch_array($q_emer);

$s_intd = "SELECT intd_start_date, intd_end_date FROM `internship_detail` WHERE `std_id`='$std_id' LIMIT 1";
$q_intd = mysqli_query($conn, $s_intd);
$r_intd = mysqli_fetch_array($q_intd);

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">ข้อมูลส่วนตัว</h1>
<div id="del_alert"></div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">ข้อมูลส่วนตัวนักศึกษาฝึกงาน</h6>
  </div>
  <div class="card-body">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">ข้อมูลส่วนตัว</h6>
      </div>
      <?php
      $origDate = $r_intd["intd_start_date"]; 
      $start_date = date("d/m/Y", strtotime($origDate));

      $origDate = $r_intd["intd_end_date"]; 
      $end_date = date("d/m/Y", strtotime($origDate));
      echo '
      <div class="card-body">
        <div class="row mb-2">
          <div class="col-3">
            <h6><strong></strong></h6>
          </div>
          <div class="col-9">
            <img src="images/students/'.$r_std["std_photo"].'" width="200px" class="img-thumbnail">
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>รหัสนักศึกษา</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_std["std_id"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>ชื่อ - นามสกุล</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_std["std_prefix"] . ' ' . $std_name . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>ระดับชั้น</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_std["std_class"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>สาขาวิชา</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_std["branch_name"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>รุ่นปีที่ฝึกงาน</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_std["inyr_lable"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>วันที่ฝึกงาน</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $start_date . ' ถึง ' . $end_date . '</p>
          </div>
        </div>
      </div>
      ';
      
        ?>
    </div>
    <div class="card mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">ข้อมูลสถานประกอบการ</h6>
      </div>
      <div class="card-body">
        <?php echo '
        <div class="row">
          <div class="col-3">
            <h6><strong>ชื่อสถานประกอบการ</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_comp["comp_name"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>ที่อยู่</strong></h6>
          </div>
          <div class="col-9 m-0">
            <p>เลขที่ ' . $r_comp["comp_address_num"] . ' หมู่ ' . $r_comp["comp_swine"] . ' ถนน ' . $r_comp["comp_road"] . ' ตำบล ' . $r_comp["comp_canton"] . ' </p>
            <p>อำเภอ ' . $r_comp["comp_district"] . ' จังหวัด ' . $r_comp["comp_province"] . '</p>
            <p>รหัสไปรษณีย์ ' . $r_comp["comp_zipcode"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>โทรศัพท์</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_comp["comp_tel"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>โทรสาร</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_comp["comp_fax"] . '</p>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-3">
            <h6><strong>แผนที่ตั้งของสถานประกอบการ</strong></h6>
          </div>
          <div class="col-9">
            <img src="images/students/'.$r_comp["comp_map"].'" width="400px" class="img-thumbnail">
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-3">
            <h6><strong>ผังองค์กร</strong></h6>
          </div>
          <div class="col-9">
            <img src="images/students/'.$r_comp["com_chart"].'" width="400px" class="img-thumbnail">
          </div>
        </div>
      ';
        ?>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">ข้อมูลทั่วไปนักศึกษา</h6>
      </div>
      <?php echo '
      <div class="card-body">
        <h6><strong>ที่อยู่ขณะฝึกงาน</strong></h6>
        <hr>
        <div class="row">
          <div class="col-3">
            <h6><strong>ที่อยู่</strong></h6>
          </div>
          <div class="col-9 m-0">
            <p>เลขที่ ' . $r_std["std_address_num"] . ' หมู่ ' . $r_std["std_swine"] . ' ถนน ' . $r_std["std_road"] . ' ตำบล ' . $r_std["std_canton"] . ' </p>
            <p>อำเภอ ' . $r_std["std_district"] . ' จังหวัด ' . $r_std["std_province"] . '</p>
            <p>รหัสไปรษณีย์ ' . $r_std["std_zipcode"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>โทรศัพท์</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_std["std_tel"] . '</p>
          </div>
        </div>
        <hr>
        <h6><strong>โรคประจำตัว</strong></h6>
        <hr>
        <div class="row">
          <div class="col-3">
            <h6><strong>โรคประจำตัว</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_std["std_disease"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>กลุ่มเลือด</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_std["std_blood_type"] . '</p>
          </div>
        </div>
        <hr>
        <h6><strong>ข้อมูลผู้ปกครอง</strong></h6>
        <hr>
        <div class="row">
          <div class="col-3">
            <h6><strong>ชื่อ - นามสกุล</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_parent["parent_name"] . '</p>
          </div>
        </div> 
        <div class="row">
          <div class="col-3">
            <h6><strong>ที่อยู่</strong></h6>
          </div>
          <div class="col-9 m-0">
            <p>เลขที่ ' . $r_parent["parent_address_num"] . ' หมู่ ' . $r_parent["parent_swine"] . ' ถนน ' . $r_parent["parent_road"] . ' ตำบล ' . $r_parent["parent_canton"] . ' </p>
            <p>อำเภอ ' . $r_parent["parent_district"] . ' จังหวัด ' . $r_parent["parent_province"] . '</p>
            <p>รหัสไปรษณีย์ ' . $r_parent["parent_zipcode"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>โทรศัพท์</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_parent["parent_tel"] . '</p>
          </div>
        </div>
        <hr>
        <h6><strong>ข้อมูลผู้ติดต่อกรณีฉุกเฉิน</strong></h6>
        <hr>
        <div class="row">
          <div class="col-3">
            <h6><strong>ชื่อ - นามสกุล</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_emer["emer_name"] . '</p>
          </div>
        </div> 
        <div class="row">
          <div class="col-3">
            <h6><strong>ที่อยู่</strong></h6>
          </div>
          <div class="col-9 m-0">
            <p>เลขที่ ' . $r_emer["emer_address_num"] . ' หมู่ ' . $r_emer["emer_swine"] . ' ถนน ' . $r_emer["emer_road"] . ' ตำบล ' . $r_emer["emer_canton"] . ' </p>
            <p>อำเภอ ' . $r_emer["emer_district"] . ' จังหวัด ' . $r_emer["emer_province"] . '</p>
            <p>รหัสไปรษณีย์ ' . $r_emer["emer_zipcode"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <h6><strong>โทรศัพท์</strong></h6>
          </div>
          <div class="col-9">
            <p>' . $r_emer["emer_tel"] . '</p>
          </div>
        </div>     
      </div>
      '; ?>
    </div>
  </div>
</div>
<?php mysqli_close($conn); ?>
<?php

$job_id = $_GET["id"];
$job_query = "SELECT * FROM `work_detail` WHERE `std_id`='$std_id' AND `wd_id`='$job_id' ORDER BY `wd_week`";
$run_query_job = mysqli_query($conn, $job_query);
$wd = mysqli_fetch_array($run_query_job);

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">บันทึกการฝึกงาน</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><span><a href="index.php?page=job_record">ตารางบันทึกการฝึกงาน</a></span> / ข้อมูลบันทึกการฝึกงาน</h6>
    <div>
      <?php echo '
      <a href="index.php?page=edit_job&&id='.$wd['wd_id'].'" class="btn btn-primary">
        <i class="fas fa-wrench"></i> แก้ไข
      </a> ';
      ?>
    </div>
  </div>
  <div class="card-body">
    <?php 
    $origDate = $wd['wd_first_day']; 
    $start_date = date("d/m/Y", strtotime($origDate));

    $origDate = $wd['wd_last_day']; 
    $end_date = date("d/m/Y", strtotime($origDate));
    echo '
    <div class="row mb-2">
      <div class="col-md-1">
        <h6><strong>สัปดาห์ที่</strong></h6>
      </div>
      <div class="col-md-1">
        <p>'.$wd["wd_week"].'</p>
      </div>
      <div class="col-md-1">
        <h6><strong>วันที่</strong></h6>
      </div>
      <div class="col-md-2">
        <p>'.$start_date.'</p>
      </div>
      <div class="col-md-1">
        <h6><strong>ถึงวันที่</strong></h6>
      </div>
      <div class="col-md-2">
        <p>'.$end_date.'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>หน่วยงาน/แผนกที่เข้าปฏิบัติงาน</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$wd["wd_dept"].'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>งานที่ปฏิบัติ</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$wd["wd_job"].'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>ปัญหาที่พบ</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$wd["wd_issue"].'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>วิธีการแก้ปัญหา</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$wd["wd_fix"].'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>ประสบการณ์/ความรู้ที่ได้รับ</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$wd["wd_exp"].'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>วิธีการป้องกันและแก้ปัญหาไม่ให้เกิดซ้ำ</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$wd["wd_solve"].'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>ข้อเสนอแนะจากผู้ควบคุมการฝึกงาน</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$wd["wd_comment"].'</p>
      </div>
    </div>
    <hr>
    '; ?>
  </div>
</div>
<?php mysqli_close($conn); ?>
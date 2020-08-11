<?php

$ext_id = $_GET["id"];
$ext_query = "SELECT * FROM `ext_intern` WHERE `std_id`='$std_id' AND `ext_id`='$ext_id' ";
$run_query_ext = mysqli_query($conn, $ext_query);
$ext = mysqli_fetch_array($run_query_ext);

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">บันทึกการฝึกงานภายนอก</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><span><a href="index.php?page=ex_job_record">ตารางบันทึกการฝึกงานภายนอก</a></span> / แก้ไขข้อมูลการฝึกงานภายนอก</h6>
    <div>
      <?php echo '
      <a href="index.php?page=edit_ex&&id='.$ext['ext_id'].'" class="btn btn-primary">
        <i class="fas fa-wrench"></i> แก้ไข
      </a> ';
      ?>
    </div>
  </div>
  <div class="card-body">
    <?php 
    $origDate = $ext["ext_date"]; 
    $ext_date = date("d/m/Y", strtotime($origDate));
    echo '
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>วัน/เดือน/ปี</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$ext_date.'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>ประเภทงาน</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$ext['ext_job'].'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>รายละเอียด</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$ext['ext_detail'].'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>ผู้มอบหมาย</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$ext['ext_assigner'].'</p>
      </div>
    </div>
    <hr>
    '; ?>
  </div>
</div>
<?php mysqli_close($conn); ?>

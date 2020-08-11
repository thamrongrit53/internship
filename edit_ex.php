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
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><span><a href="index.php?page=ex_job_record">ตารางบันทึกการฝึกงานภายนอก</a></span> / แก้ไขข้อมูลการฝึกงานภายนอก</h6>
  </div>
  <div class="card-body">
    <div id="ext_edit_alert"></div>
    <form id="ext_edit_form" method="POST">
      <div class="form-group" hidden>
        <label for="ext_id">รหัส</label>
        <input type="text" class="form-control" name="ext_id" id="ext_id" value="<?php echo $ext["ext_id"]; ?>" >
      </div>
      <div class="row">
        <div class="col-md-3">
          <h6>วัน/เดือน/ปี</h6>
        </div>
        <div class="col-md-9">
          <p>
          <?php 
            $origDate = $ext["ext_date"]; 
            $ext_date = date("d/m/Y", strtotime($origDate));
            echo $ext_date; 
          ?>
          </p>
        </div>
      </div>
      <div class="form-group">
        <label for="ext_job">ประเภทงาน</label>
        <input type="text" class="form-control" name="ext_job" id="ext_job" value="<?php echo $ext["ext_job"]; ?>">
      </div>
      <div class="form-group">
        <label for="ext_detail">รายละเอียด</label>
        <input type="text" class="form-control" name="ext_detail" id="ext_detail" value="<?php echo $ext["ext_detail"]; ?>">
      </div>
      <div class="form-group">
        <label for="ext_assigner">ผู้มอบหมาย</label>
        <input type="text" class="form-control" name="ext_assigner" id="ext_assigner" value="<?php echo $ext["ext_assigner"]; ?>">
      </div>
      <hr>
      <button class="btn btn-primary" type="submit" id="ext_edit_btn">บันทึก</button>
    </form>
  </div>
</div>

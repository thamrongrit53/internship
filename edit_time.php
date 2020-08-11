<?php

$wt_id = $_GET["id"];
$time_query = "SELECT * FROM `work_time` WHERE `std_id`='$std_id' AND `wt_id`='$wt_id' ";
$run_query_time = mysqli_query($conn, $time_query);
$wt = mysqli_fetch_array($run_query_time);
?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">บันทึกเวลาปฎิบัติงาน</h1>
<div id="time_alert"></div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><span><a href="index.php?page=time_record">ตารางเวลาปฎิบัติงานนักศึกษาฝึกงาน</a> / แก้ไขเวลาปฎิบัติงานนักศึกษาฝึกงาน</span></h6>
  </div>
  <div class="card-body">
  <div id="time_edit_alert"></div>
    <form id="time_edit_form" method="POST">
      <div class="form-group" hidden>
        <label for="wt_id">รหัส</label>
        <input type="text" class="form-control" name="wt_id" id="wt_id" value="<?php echo $wt["wt_id"]; ?>" >
      </div>
      <div class="row">
        <div class="col-md-3">
          <h6>วัน/เดือน/ปี</h6>
        </div>
        <div class="col-md-9">
          <p>
          <?php 
            $origDate = $wt["wt_date"]; 
            $wt_date = date("d/m/Y", strtotime($origDate));
            echo $wt_date; 
          ?>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="wt_in_time">เวลามา</label>
            <input type="time" class="form-control" name="wt_in_time" id="wt_in_time" value="<?php echo $wt["wt_in_time"]; ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="wt_out_time">เวลากลับ</label>
            <input type="time" class="form-control" name="wt_out_time" id="wt_out_time" value="<?php echo $wt["wt_out_time"]; ?>">
          </div>
        </div>
      </div>
      <hr>
      <button class="btn btn-primary" type="submit" id="time_edit_btn">บันทึก</button>
    </form>
  </div>
</div>

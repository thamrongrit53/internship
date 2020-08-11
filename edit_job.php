<?php

$job_id = $_GET["id"];
$job_query = "SELECT * FROM `work_detail` WHERE `std_id`='$std_id' AND `wd_id`='$job_id' ";
$run_query_job = mysqli_query($conn, $job_query);
$wd = mysqli_fetch_array($run_query_job);

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">บันทึกการฝึกงาน</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><span><a href="index.php?page=job_record">ตารางบันทึกการฝึกงาน</a></span> / แก้ไขข้อมูลการฝึกงาน</h6>
  </div>
  <div class="card-body">
    <div id="job_edit_alert"></div>
    <form id="job_edit_form" method="POST">
      <div class="form-group" hidden>
        <label for="wd_id">รหัส</label>
        <input type="text" class="form-control" name="wd_id" id="wd_id" value="<?php echo $wd["wd_id"]; ?>" >
      </div>
      <div class="row">
        <div class="col-md-2">
          <label for="wd_first_day">สัปดาห์ที่</label>
          <input type="text" class="form-control" name="wd_week" id="wd_week" value="<?php echo $wd["wd_week"]; ?>" readonly>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="wd_first_day">วันที่</label>
            <input type="date" class="form-control" name="wd_first_day" id="wd_first_day" value="<?php echo $wd["wd_first_day"]; ?>">
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label for="wd_last_day">ถึง วันที่</label>
            <input type="date" class="form-control" name="wd_last_day" id="wd_last_day" value="<?php echo $wd["wd_last_day"]; ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="wd_dept">หน่วยงาน/แผนกที่เข้าปฏิบัติงาน</label>
        <input type="text" class="form-control" name="wd_dept" id="wd_dept" value="<?php echo $wd["wd_dept"]; ?>">
      </div>
      <div class="form-group">
        <label for="wd_job">งานที่ปฏิบัติ</label>
        <textarea class="form-control" name="wd_job" id="wd_job" rows="5" style="resize: none;"><?php echo $wd["wd_job"]; ?></textarea>
      </div>
      <div class="form-group">
        <label for="wd_issue">ปัญหาที่พบ</label>
        <textarea class="form-control" name="wd_issue" id="wd_issue" rows="5" style="resize: none;"><?php echo $wd["wd_issue"]; ?></textarea>
      </div>
      <div class="form-group">
        <label for="wd_fix">วิธีการแก้ไข</label>
        <textarea class="form-control" name="wd_fix" id="wd_fix" rows="5" style="resize: none;"><?php echo $wd["wd_fix"]; ?></textarea>
      </div>
      <div class="form-group">
        <label for="wd_exp">ประสบการณ์/ความรู้ที่ได้รับ</label>
        <textarea class="form-control" name="wd_exp" id="wd_exp" rows="5" style="resize: none;"><?php echo $wd["wd_exp"]; ?></textarea>
      </div>
      <div class="form-group">
        <label for="wd_solve">วิธีการป้องกันและแก้ปัญหาไม่ให่เกิดซ้ำ</label>
        <textarea class="form-control" name="wd_solve" id="wd_solve" rows="5" style="resize: none;"><?php echo $wd["wd_solve"]; ?></textarea>
      </div>
      <div class="form-group">
        <label for="wd_comment">ข้อเสนอแนะจากผู้ควบคุมการฝึกงาน</label>
        <textarea class="form-control" name="wd_comment" id="wd_comment" rows="5" style="resize: none;"><?php echo $wd["wd_comment"]; ?></textarea>
      </div>
      <hr>
      <button class="btn btn-primary" type="submit" id="job_edit_btn">บันทึก</button>
    </form>
  </div>
</div>

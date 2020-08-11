<?php

$job_query = "SELECT * FROM `work_detail` WHERE `std_id`='$std_id' ORDER BY `wd_week`";
$run_query_job = mysqli_query($conn, $job_query);

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">บันทึกการฝึกงาน</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">ตารางบันทึกการฝึกงาน</h6>
    <div>
      <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#jobRecordModal">
        <i class="fas fa-plus"></i> บันทึก
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10%">สัปดาห์ที่</th>
            <th width="20%">วัน/เดือน/ปี</th>
            <th width="25%">หน่วยงาน/แผนก</th>
            <th width="35%">งานที่ปฏิบัติ</th>
            <th width="10%">ตัวเลือก</th>
          </tr>
        </thead>
        <tbody>
        <?php while($wd = mysqli_fetch_array($run_query_job, MYSQLI_ASSOC)) {
          $origDate = $wd['wd_first_day']; 
          $start_date = date("d/m/Y", strtotime($origDate));

          $origDate = $wd['wd_last_day']; 
          $end_date = date("d/m/Y", strtotime($origDate));
          echo '
          <tr>
            <td>'.$wd['wd_week'].'</td>
            <td>'.$start_date.' - '.$end_date.'</td>
            <td>'.$wd['wd_dept'].'</td>
            <td>'.$wd['wd_job'].'</td>
            <td>
              <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  เลือก
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a href="index.php?page=view_more_job&&id='.$wd['wd_id'].'" class="dropdown-item">เพิ่มเติม</a>
                  <a href="index.php?page=edit_job&&id='.$wd['wd_id'].'" class="dropdown-item">แก้ไข</a>
                  <a href="#" class="dropdown-item del-item" del_id="'.$wd['wd_id'].'" onclick="onDel('.$wd['wd_id'].')">ลบ</a>
                </div>
              </div>
            </td>
          </tr>';
        } 
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="jobRecordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">บันทึกการฝึกงาน</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="job_record_alert"></div>
        <form id="job_record_form" method="POST">
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label for="wd_week">สัปดาห์ที่</label>
                <input type="number" class="form-control" name="wd_week" id="wd_week">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="wd_first_day">วันที่</label>
                <input type="date" class="form-control" name="wd_first_day" id="wd_first_day">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="wd_last_day">ถึง วันที่</label>
                <input type="date" class="form-control" name="wd_last_day" id="wd_last_day">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="wd_dept">หน่วยงาน/แผนกที่เข้าปฏิบัติงาน</label>
            <input type="text" class="form-control" name="wd_dept" id="wd_dept">
          </div>
          <div class="form-group">
            <label for="wd_job">งานที่ปฏิบัติ</label>
            <textarea class="form-control" name="wd_job" id="wd_job" rows="5" style="resize: none;"></textarea>
          </div>
          <div class="form-group">
            <label for="wd_issue">ปัญหาที่พบ</label>
            <textarea class="form-control" name="wd_issue" id="wd_issue" rows="5" style="resize: none;"></textarea>
          </div>
          <div class="form-group">
            <label for="wd_fix">วิธีการแก้ไข</label>
            <textarea class="form-control" name="wd_fix" id="wd_fix" rows="5" style="resize: none;"></textarea>
          </div>
          <div class="form-group">
            <label for="wd_exp">ประสบการณ์/ความรู้ที่ได้รับ</label>
            <textarea class="form-control" name="wd_exp" id="wd_exp" rows="5" style="resize: none;"></textarea>
          </div>
          <div class="form-group">
            <label for="wd_solve">วิธีการป้องกันและแก้ปัญหาไม่ให่เกิดซ้ำ</label>
            <textarea class="form-control" name="wd_solve" id="wd_solve" rows="5" style="resize: none;"></textarea>
          </div>
          <div class="form-group">
            <label for="wd_comment">ข้อเสนอแนะจากผู้ควบคุมการฝึกงาน</label>
            <textarea class="form-control" name="wd_comment" id="wd_comment" rows="5" style="resize: none;"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" id="job_record_btn">บันทึก</button>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>

<script>

function onDel(id){
  
  if(confirm('Confirm Delete?')==true) {
    // console.log(id);
    window.location.href = "index.php?page=action_del_job&&del_id=" + id;
  }
}

</script>
<?php mysqli_close($conn); ?>
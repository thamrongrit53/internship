<?php

$query_lev = "SELECT * FROM `leaves` WHERE `std_id`='$std_id' ORDER BY `lev_date` DESC";
$run_query_lev = mysqli_query($conn, $query_lev);
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">ส่งใบลา</h1>
<!-- DataTales Example -->
<div id="del_alert"></div>
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">เขียนใบลาฝึกงาน</h6>
    <div>
      <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#leavesModal">
        <i class="fas fa-plus"></i> บันทึก
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="10%">วัน/เดือน/ปี</th>
            <th width="10%">ประเภทการลา</th>
            <th width="20%">วันที่ลา</th>
            <th width="40%">เหตุผลที่ลา</th>
            <th width="20%">ตัวเลือก</th>
          </tr>
        </thead>
        <tbody>
        <?php while($lev = mysqli_fetch_array($run_query_lev, MYSQLI_ASSOC)){
          $origDate = $lev['lev_date']; 
          $lev_date = date("d/m/Y", strtotime($origDate));

          $origDate = $lev['lev_first_day']; 
          $start_date = date("d/m/Y", strtotime($origDate));

          $origDate = $lev['lev_last_day']; 
          $end_date = date("d/m/Y", strtotime($origDate));
          echo '
          <tr>
            <td>'.$lev_date.'</td>
            <td>'.$lev['lev_type'].'</td>
            <td>'.$start_date.' - '.$end_date.'</td>
            <td>'.$lev['lev_reason'].'</td>
          ';
          if($lev['lev_approved'] == 0) {
            echo '
              <td>
                <button class="btn btn-info btn-block" id="del_lev_btn del-item" del_id="'.$lev['lev_id'].'" onclick="onDel('.$lev['lev_id'].')">ยกเลิกการลา</button>
              </td>
            ';
          } else {
            echo '
              <td>
                <a href="#" class="btn btn-success btn-block disabled">อนุมัติแล้ว</a>
              </td>
            ';
          }
          echo '</tr>';
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="leavesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">บันทึกการฝึกงานภายนอก</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="leaves_alert"></div>
        <form  method="POST" action="action_leaves.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="lev_date">วันที่</label>
            <input type="date" class="form-control" name="lev_date" id="lev_date">
          </div>
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="lev_type" value="ลาป่วย" checked>ลาป่วย
                  </label>
                </div> 
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="lev_type" value="ลากิจ">ลากิจ
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="lev_first_day">ตั้งแต่วันที่</label>
                <input type="date" class="form-control" name="lev_first_day" id="lev_first_day">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="lev_last_day">ถึงวันที่</label>
                <input type="date" class="form-control" name="lev_last_day" id="lev_last_day">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="lev_sum_day">รวมจำนวนวัน</label>
            <input type="number" class="form-control" name="lev_sum_day" id="lev_sum_day" min="1">
          </div>
          <div class="form-group">
            <label for="lev_reason">เหตุผลที่ลา</label>
            <input type="text" class="form-control" name="lev_reason" id="lev_reason">
          </div>
          <div class="form-group">
            <label for="lev_attachment">สิ่งที่แนบมาด้วย</label>
            <input type="file" name="image" id="image" class="form-control" >
          </div>
           <div class="modal-footer">
        <button class="btn btn-primary" id="leaves_btn" type="submit">บันทึก</button>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script>

function onDel(id){
  
  if(confirm('Confirm Delete?')==true) {
    // console.log(id);
    window.location.href = "index.php?page=action_del_lev&&del_id=" + id;
  }
}
</script>
<?php mysqli_close($conn); ?>
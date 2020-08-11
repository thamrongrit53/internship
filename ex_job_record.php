<?php

$ex_sql = "SELECT ext_id, ext_date, ext_job, ext_detail, ext_assigner FROM `ext_intern` WHERE `std_id`='$std_id' ORDER BY ext_date ";
$ex_query = mysqli_query($conn, $ex_sql);

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">บันทึกการฝึกงานภายนอก</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">ตารางบันทึกการฝึกงานภายนอก</h6>
    <div>
      <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exJobRecordModal">
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
            <th width="20%">ประเภทงาน</th>
            <th width="40%">รายละเอียด</th>
            <th width="20%">ผู้มอบหมาย</th>
            <th width="10%">ตัวเลือก</th>
          </tr>
        </thead>
        <tbody>
        <?php while($ext = mysqli_fetch_array($ex_query, MYSQLI_ASSOC)) {    
          $origDate = $ext["ext_date"]; 
          $ext_date = date("d/m/Y", strtotime($origDate));

          echo '
          <tr>
            <td>'.$ext_date.'</td>
            <td>'.$ext["ext_job"].'</td>
            <td>'.$ext["ext_detail"].'</td>
            <td>'.$ext["ext_assigner"].'</td>
            <td>
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  เลือก
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="index.php?page=view_more_ex&&id='.$ext["ext_id"].'" class="dropdown-item">เพิ่มเติม</a>
                <a href="index.php?page=edit_ex&&id='.$ext["ext_id"].'" class="dropdown-item">แก้ไข</a>
                <a href="#" class="dropdown-item del-item" del_id="'.$ext["ext_id"].'" onclick="onDel('.$ext["ext_id"].')">ลบ</a>
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

<div class="modal fade" id="exJobRecordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">บันทึกการฝึกงานภายนอก</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="ex_job_alert"></div>
        <form id="ex_job_form" method="POST">
          <div class="form-group">
            <label for="ext_date">วัน/เดือน/ปี</label>
            <input type="date" class="form-control" name="ext_date" id="ext_date" value="<?php echo date('Y-m-d');?>" readonly>
          </div>
          <div class="form-group">
            <label for="ext_job">ประเภทงาน</label>
            <input type="text" class="form-control" name="ext_job" id="ext_job">
          </div>
          <div class="form-group">
            <label for="ext_detail">รายละเอียด</label>
            <input type="text" class="form-control" name="ext_detail" id="ext_detail">
          </div>
          <div class="form-group">
            <label for="ext_assigner">ผู้มอบหมาย</label>
            <input type="text" class="form-control" name="ext_assigner" id="ext_assigner">
          </div>
          <hr>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" id="ex_job_btn">บันทึก</button>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>

<script>

function onDel(id){
  
  if(confirm('Confirm Delete?')==true) {
    // console.log(id);
    window.location.href = "index.php?page=action_del_ex&&del_id=" + id;
  }
}

</script>
<?php mysqli_close($conn); ?>
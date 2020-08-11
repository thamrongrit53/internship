<?php

$time_query = "SELECT * FROM `work_time` WHERE `std_id`='$std_id' ";
$run_query_time = mysqli_query($conn, $time_query);

?>

<!-- Page Heading -->

<h1 class="h3 mb-2 text-gray-800">บันทึกเวลาปฎิบัติงาน</h1>
<div id="time_alert"></div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">ตารางเวลาปฎิบัติงานนักศึกษาฝึกงาน</h6>
    <div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#timeRecordModal">
        <i class="fas fa-plus"></i> บันทึก
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>วัน/เดือน/ปี</th>
            <th>เวลามา</th>
            <th>เวลากลับ</th>
            <th>ตัวเลือก</th>
          </tr>
        </thead>
        <tbody>
        <?php while($wt = mysqli_fetch_array($run_query_time, MYSQLI_ASSOC)) {
          $origDate = $wt["wt_date"]; 
          $wt_date = date("d/m/Y", strtotime($origDate));
          echo '
          <tr>
            <td>'.$wt_date.'</td>
            <td>'.$wt['wt_in_time'].'</td>
            <td>'.$wt['wt_out_time'].'</td>
            <td>
              <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  เลือก
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a href="index.php?page=edit_time&&id='.$wt['wt_id'].'" class="dropdown-item">แก้ไข</a>
                  <a href="#" class="dropdown-item del-item" del_id="'.$wt['wt_id'].'" onclick="onDel('.$wt['wt_id'].')">ลบ</a>
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

<div class="modal fade" id="timeRecordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">บันทึกเวลาปฏิบัติงาน</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="time_record_alert"></div>
        <form id="time_record_form" method="POST">
          <div class="form-group">
            <label for="date">วัน/เดือน/ปี</label>
            <input type="date" class="form-control" name="date" id="date" value="<?php echo date('Y-m-d');?>" readonly>
          </div>
          <div class="form-group">
            <label for="come_time">เวลามา</label>
            <input type="time" class="form-control" name="come_time" id="come_time">
          </div>
          <div class="form-group">
            <label for="out_time">เวลากลับ</label>
            <input type="time" class="form-control" name="out_time" id="out_time">
          </div>
           <div class="form-group">
            <label for="out_time">latitude</label>
            <input type="text" class="form-control" name="lat" id="lat" readonly>
          </div>
          <div class="form-group">
            <label for="out_time">longitude</label>
            <input type="text" class="form-control" name="lng" id="lng" readonly>
          </div>
      <button type="button" class="btn btn-danger" onclick="getLocation()">check in</button>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" id="time_record_btn">บันทึก</button>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>

<script>

function onDel(id){
  
  if(confirm('Confirm Delete?')==true) {
    // console.log(id);
    window.location.href = "index.php?page=action_del_time&&del_id=" + id;
  }
}

</script>
<?php mysqli_close($conn); ?>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
document.getElementById("lat").value = position.coords.latitude;
document.getElementById("lng").value = position.coords.longitude;
}

</script>

          

  
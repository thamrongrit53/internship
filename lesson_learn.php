<?php
include "./lesson_learn_data.php";

$ans_query = "SELECT led_id, led_date FROM `lesson_learn_detail` WHERE `std_id`='$std_id' ORDER BY `led_date` ";
$run_query_ans = mysqli_query($conn, $ans_query);

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Lesson Learn</h1>
<div id="time_alert"></div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">แผนภูมิแสดงผล Lesson Learn</h6>
    <div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lessonModal">
        <i class="fas fa-plus"></i> บันทึก
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lesson Learn</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-radar">
              <canvas id="myRadarChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- Pie Chart -->
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">รายการที่บันทึก</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>วัน/เดือน/ปี</th>
                  </tr>
                </thead>
                <tbody>
                <?php while($ans = mysqli_fetch_array($run_query_ans, MYSQLI_ASSOC)) {
                  $origDate = $ans['led_date']; 
                  $led_date = date("d/m/Y", strtotime($origDate));
                  echo '
                  <tr>
                    <td><a href="index.php?page=view_more_les&&id='.$ans["led_id"].'"><u>'.$led_date.'</u></a></td>
                  </tr>';
                }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="lessonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">บันทึกผล Lesson Learn</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="less_record_alert"></div>
        <form id="less_record_form" method="POST">
          <div class="form-group">
            <label for="date">วัน/เดือน/ปี</label>
            <input type="date" class="form-control" name="date" id="date" value="<?php echo date('Y-m-d');?>" readonly>
          </div>
          <div class="form-group">
            <label for="led_issue"><u>Lesson Learn</u> ปัญหาที่พบ</label>
            <textarea class="form-control" name="led_issue" id="led_issue" rows="5" style="resize: none;"></textarea>
          </div>
          <div class="form-group">
            <label for="led_exp">สิ่งที่เรียนรู้</label>
            <textarea class="form-control" name="led_exp" id="led_exp" rows="5" style="resize: none;"></textarea>
          </div>
          <div class="form-group">
            <label for="led_solve">วิธีการป้องกันและแก้ปัญหาไม่ให้เกิดซ้ำ</label>
            <textarea class="form-control" name="led_solve" id="led_solve" rows="5" style="resize: none;"></textarea>
          </div>
          <hr>
          <h6><strong>เกี่ยวกับด้าน</strong></h6>
          <?php 
          $less_query = "SELECT * FROM `lesson_learn` ORDER BY `les_id` LIMIT 6";
          $run_query_less = mysqli_query($conn, $less_query);
          while($les = mysqli_fetch_array($run_query_less, MYSQLI_ASSOC)){
            // echo '<p>'.$les["les_lable_th"].'</p>';
            echo '
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="defaultUnchecked'.$les["les_id"].'" name="ans'.$les["les_id"].'" value="1">
              <label class="custom-control-label" for="defaultUnchecked'.$les["les_id"].'">'.$les["les_lable_th"].'</label>
            </div>';
          }
          ?>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit" id="less_record_btn">บันทึก</button>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>

<script>

function onDel(id){
  
  if(confirm('Confirm Delete?')==true) {
    // console.log(id);
    window.location.href = "index.php?page=action_del_less&&del_id=" + id;
  }
}

</script>

<script src="vendor/chart.js-2.8.0/dist/Chart.min.js"></script>
<script src="vendor/chart.js-2.8.0/dist/Chart.bundle.min.js"></script>
<?php echo "
<script>
var radar = document.getElementById('myRadarChart');
if (radar) {
  var data = {
    labels: ['".$lables[0]."','".$lables[1]."','".$lables[2]."','".$lables[3]."','".$lables[4]."','".$lables[5]."'],
    datasets: [{
      label: 'Answer',
      data: [".$sum1.", ".$sum2.", ".$sum3.", ".$sum4.", ".$sum5.", ".$sum6."]
    }]
  }
  var options = {
    scale: {
      // Hides the scale
      display: true,
      ticks: {
        beginAtZero: true
      }
    },
    title: {
      display: true,
      text: 'Lesson Learn Chart'
    },
    tooltips: {
      mode: 'index'
    }
  };
  var myRadarChart = new Chart(radar,{
      type: 'radar',
      data: data,
      options: options
  });
}
</script>
";
?>
<?php mysqli_close($conn); ?>
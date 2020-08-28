<?php

include "./lesson_learn_data.php";

$q_data1 = "SELECT SUM(wt_total) as wt_sum FROM `work_time` WHERE `std_id`='$std_id' ";
$q_data2 = "SELECT COUNT(wd_id) as count FROM `work_detail` WHERE `std_id`='$std_id' ";
$q_data3 = "SELECT COUNT(ext_id) as count FROM `ext_intern` WHERE `std_id`='$std_id' ";
$q_data4 = "SELECT COUNT(lev_id) as count FROM `leaves` WHERE `std_id`='$std_id' ";

$q_data1 = mysqli_query($conn, $q_data1);
$q_data2 = mysqli_query($conn, $q_data2);
$q_data3 = mysqli_query($conn, $q_data3);
$q_data4 = mysqli_query($conn, $q_data4);

$data1 = mysqli_fetch_array($q_data1);
$data2 = mysqli_fetch_array($q_data2);
$data3 = mysqli_fetch_array($q_data3);
$data4 = mysqli_fetch_array($q_data4);

$s_std = "SELECT student.*, branch.branch_name  FROM `student` 
          INNER JOIN `branch` ON student.branch_id = branch.branch_id
          WHERE `std_id`='$std_id' LIMIT 1";
$q_std = mysqli_query($conn, $s_std);
$r_std = mysqli_fetch_array($q_std);

$s_intd = "SELECT intd_start_date, intd_end_date FROM `internship_detail` WHERE `std_id`='$std_id' LIMIT 1";
$q_intd = mysqli_query($conn, $s_intd);
$r_intd = mysqli_fetch_array($q_intd);

$hour = (int)$data1["wt_sum"];
?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">จำนวนชั่วโมงฝึกงาน</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hour; ?> ชั่วโมง</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-clock fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">จำนวนบันทึกการฝึกงาน</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data2["count"]; ?> รายการ</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">จำนวนบันทึกการฝึกงานภายนอก</div>
            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data3["count"]; ?> รายการ</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">จำนวนการลาฝึกงาน</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data4["count"]; ?> ครั้ง</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Content Row -->
<div class="row">
  <!-- Area Chart -->
  <div class="col-xl-7 col-lg-6">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Lesson Learn</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">ตัวเลือก:</div>
            <a class="dropdown-item" href="index.php?page=lesson_learn">Lesson Learn</a>
          </div>
        </div>
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
  <div class="col-xl-5 col-lg-6">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">ตัวเลือก:</div>
            <a class="dropdown-item" href="index.php?page=profile">ข้อมูลส่วนตัว</a>
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
      <?php 
      $origDate = $r_intd["intd_start_date"]; 
      $start_date = date("d/m/Y", strtotime($origDate));

      $origDate = $r_intd["intd_end_date"]; 
      $end_date = date("d/m/Y", strtotime($origDate));
      echo '
        <div class="row">
          <div class="col-4">
            <h6><strong>รหัสนักศึกษา</strong></h6>
          </div>
          <div class="col-8">
            <p>' . $r_std["std_id"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <h6><strong>ชื่อ - นามสกุล</strong></h6>
          </div>
          <div class="col-8">
            <p>' . $r_std["std_prefix"] . ' ' . $std_name . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <h6><strong>ระดับชั้น</strong></h6>
          </div>
          <div class="col-8">
            <p>' . $r_std["std_class"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <h6><strong>สาขาวิชา</strong></h6>
          </div>
          <div class="col-8">
            <p>' . $r_std["branch_name"] . '</p>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <h6><strong>วันที่ฝึกงาน</strong></h6>
          </div>
          <div class="col-8">
            <p>' . $start_date . ' ถึง ' . $end_date . '</p>
          </div>
        </div>
      
      ';
      ?>
      </div>
    </div>
  </div>
</div>
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


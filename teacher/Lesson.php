<?php 
session_start();
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Charts</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>

<body id="page-top" style="font-family: 'Kanit', sans-serif;">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html"><img src="img/sbac.jpg" style="width: 30px"> Internship-System SBAC</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="ค้นหา" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
  
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div aria-labelledby="messagesDropdown">
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
     <ul class="sidebar navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>หน้าแรก</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="Record_internship.php">
          <i class="fas fa-fw fa-table"></i>
          <span>บันทึกฝึกงานนักศึกษา</span></a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="Record_leave.php">
          <i class="fas fa-fw fa-table"></i>
          <span>การลาฝึกงาน</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="InternshipTime.php">
          <i class="fas fa-fw fa-table"></i>
          <span>สถิติบัทึกเวลาฝึกงาน</span></a>
      </li>
          <li class="nav-item ">
        <a class="nav-link" href="InternshipTime_out.php">
          <i class="fas fa-fw fa-table"></i>
          <span>บันทึกการฝึกงานภายนอก</span></a>
      </li>
          <li class="nav-item active">
        <a class="nav-link" href="Lesson.php">
             <i class="fas fa-fw fa-chart-area"></i>
          <span>Lesson Learn</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="studentinternship.php">
             <i class="fas fa-fw fa-table"></i>
          <span>ข้อมูลนักศึกษาฝึกงาน</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">รายงาน</a>
          </li>
          <li class="breadcrumb-item active">Lesson Learn</li>
        </ol>
        <?php 
          
          $query = "SELECT COUNT(ans_id) AS totol, DATE_FORMAT(les_date, '%d') AS datesave FROM lesson_learn_ans GROUP BY DATE_FORMAT(les_date, '%d%') DESC";
          $result = mysqli_query($conn, $query);
          $resultchart = mysqli_query($conn, $query);  
           
           
           //for chart
          $datesave = array();
          $totol = array();
           
          while($rs = mysqli_fetch_array($resultchart)){ 
            $datesave[] = "\"".$rs['datesave']."\""; 
            $totol[] = "\"".$rs['totol']."\""; 
          }
          $datesave = implode(",", $datesave); 
          $totol = implode(",", $totol); 
         ?>
          
        <?php 
         
          $s_sum1 = "SELECT AVG(ans_result) total FROM `lesson_learn_ans` WHERE `les_id`='1' ";
          $s_sum2 = "SELECT AVG(ans_result) total FROM `lesson_learn_ans` WHERE `les_id`='2' ";
          $s_sum3 = "SELECT AVG(ans_result) total FROM `lesson_learn_ans` WHERE `les_id`='3' ";
          $s_sum4 = "SELECT AVG(ans_result) total FROM `lesson_learn_ans` WHERE `les_id`='4' ";
          $s_sum5 = "SELECT AVG(ans_result) total FROM `lesson_learn_ans` WHERE `les_id`='5' ";
          $s_sum6 = "SELECT AVG(ans_result) total FROM `lesson_learn_ans` WHERE `les_id`='6' ";
          
          $q_sum1 = mysqli_query($conn, $s_sum1);
          $q_sum2 = mysqli_query($conn, $s_sum2);
          $q_sum3 = mysqli_query($conn, $s_sum3);
          $q_sum4 = mysqli_query($conn, $s_sum4);
          $q_sum5 = mysqli_query($conn, $s_sum5);
          $q_sum6 = mysqli_query($conn, $s_sum6);
          
          $r_sum1 = mysqli_fetch_array($q_sum1);
          $r_sum2 = mysqli_fetch_array($q_sum2);
          $r_sum3 = mysqli_fetch_array($q_sum3);
          $r_sum4 = mysqli_fetch_array($q_sum4);
          $r_sum5 = mysqli_fetch_array($q_sum5);
          $r_sum6 = mysqli_fetch_array($q_sum6);
          
          $sum1 = $r_sum1["total"];
          $sum2 = $r_sum2["total"];
          $sum3 = $r_sum3["total"];
          $sum4 = $r_sum4["total"];
          $sum5 = $r_sum5["total"];
          $sum6 = $r_sum6["total"];
         ?>
        <!-- Area Chart Example-->
        <script src="vendor/chart.js-2.8.0/dist/Chart.bundle.js"></script>
        <script src="vendor/chart.js-2.8.0/dist/Chart.bundle.min.js"></script>
        <script src="vendor/chart.js-2.8.0/dist/Chart.js"></script>
        <script src="vendor/chart.js-2.8.0/dist/Chart.min.js"></script>
        <link href="vendor/chart.js-2.8.0/dist/Chart.min.css" rel="stylesheet" type="text/css">
        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                สถิติบัทึก Lesson Learn </div>
              <div class="card-body">
              <canvas id="myChart" width="800px" height="300px"></canvas>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Lesson Learn    </div>
              <div class="card-body">
                <canvas id="myRadarChart" width="100%" height="100"></canvas>
              </div>
            </div>
          </div>
        </div>
       
<?php echo "
<script>
var radar = document.getElementById('myRadarChart');
if (radar) {
  var data = {
    labels: ['Safety', 'Moral', 'Skill', 'Management', 'Maturity', 'Communication'],
    datasets: [{
      label: 'Answer',
      data: [".$sum1.", ".$sum2.", ".$sum3.", ".$sum4.", ".$sum5.", ".$sum6."],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
    ],
    borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
    ],
    borderWidth: 1
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
 <script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $datesave;?>],
        datasets: [{
            label: 'Lesson Learn ',
            data: [<?php echo $totol;?>],
            backgroundColor: [
          
                'rgba(54, 162, 235, 0.2)'
                
            ],
            borderColor: [
                
                'rgba(54, 162, 235, 1)'
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
          
         
        
       

 <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ตารางการบันทึก Lesson Learn</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>รหัสนักศึกษา</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ทักษะ</th>
                    <th>รายละเอียด</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>รหัสนักศึกษา</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ทักษะ</th>
                    <th>รายละเอียด</th>
                  </tr>
                </tfoot>
            <?php
        
    $sql = "SELECT student.*,branch.*,lesson_learn_ans.*,lesson_learn.* FROM student,branch,lesson_learn_ans,lesson_learn
  WHERE student.branch_id = branch.branch_id AND student.std_id = lesson_learn_ans.std_id  AND lesson_learn_ans.les_id= lesson_learn.les_id ";
$query = mysqli_query($conn,$sql);

while ($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
?>
                <tbody>
                  <tr>
                  <td><?php echo $result["std_id"];?></td>
                    <td><?php echo $result["std_fname"];?>&nbsp;<?php echo $result["std_lname"];?></td>
                    <td><?php echo $result["les_lable_th"];?></td>
                    <td><center><a href="detail_lesson.php?id=<?php echo $result["std_id"];?>" class="btn btn-primary">รายละเอียด</a></center></td>
                  </tr>
<?php 
} 
?>    
                </tbody>
              </table>
            </div>
          </div>
         
        </div>

     

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ต้องการออกจากระบบหรือไม่?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
          <a class="btn btn-primary" href="login.php">ตกลง</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>

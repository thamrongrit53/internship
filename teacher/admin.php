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

  <title>SBAC Admin - Dashboard</title>
<!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>

<body id="page-top" style="font-family: 'Kanit', sans-serif;" >

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
      <li class="nav-item active">
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
          <span>บันทึกเวลาฝึกงาน</span></a>
      </li>
          <li class="nav-item ">
        <a class="nav-link" href="InternshipTime_out.php">
          <i class="fas fa-fw fa-table"></i>
          <span>บันทึกการฝึกงานภายนอก</span></a>
      </li>
          <li class="nav-item ">
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
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">หน้าแรก</a>
          </li>
          <li class="breadcrumb-item active">ดูภาพรวม</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">รายงานบันทึกฝึกงานนักศึกษา</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="Record_internship.php">
                <span class="float-left">ดูเพิ่ม</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">รายงานการลาฝึกงาน</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="Record_leave.php">
                <span class="float-left">ดูเพิ่ม</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">Lesson</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="Lesson.php">
                <span class="float-left">ดูเพิ่ม</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            รายงานการไปฝึกงาน /เดือน</div>
          <div class="card-body">
          <?php 
          
          $query = "SELECT COUNT(wt_id) AS totol, DATE_FORMAT(wt_create_at, '%d') AS datesave FROM work_time GROUP BY DATE_FORMAT(wt_create_at, '%d%') DESC";
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
          <canvas id="myChart" width="800px" height="300px"></canvas>
          <script>
          var ctx = document.getElementById("myChart").getContext('2d');
          var myChart = new Chart(ctx, {
           type: 'line',
             data: {
                   labels: [<?php echo $datesave;?>
    
                         ],
                datasets: [{
                 label: 'การไปฝึกงาน /เดือน',
                 data: [<?php echo $totol;?>
                      ],
            backgroundColor: [
               
                'rgba(153, 102, 255, 0.2)',
                
            ],
            borderColor: [
            
                'rgba(153, 102, 255, 1)',
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>  
          </div>
         
        </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ตารางบันทึกฝึกงานภายนอก</div>
          <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>รหัสนักศึกษา</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่</th>
                    <th>ประเภทงาน</th>
                    <th>รายละเอียด</th>
                    <th>ผู้มอบหมาย</th>
                    <th>รายละเอียด</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>รหัสนักศึกษา</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่</th>
                    <th>ประเภทงาน</th>
                    <th>รายละเอียด</th>
                    <th>ผู้มอบหมาย</th>
                    <th>รายละเอียด</th>
                  </tr>
                </tfoot>
                <?php
              $id=$_GET["id"];
    $sql = "SELECT student.*,branch.*,ext_intern.* FROM student,branch,ext_intern
  WHERE student.branch_id = branch.branch_id AND student.std_id = ext_intern.std_id ";
$query = mysqli_query($conn,$sql);

while ($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
?>
                <tbody>
                  <tr>
                    <td><?php echo $result["std_id"];?></td>
                    <td><?php echo $result["std_fname"];?>&nbsp;<?php echo $result["std_lname"];?></td>
                    <td><?php echo $result["ext_date"];?></td>
                    <td><?php echo $result["ext_job"];?></td>
                    <td><?php echo $result["ext_detail"];?></td>
                    <td><?php echo $result["ext_assigner"];?></td>
                    <td><center><a href="detail_time_out.php?id=<?php echo $result["std_id"];?>" class="btn btn-primary">รายละเอียด</a></center></td>
                  </tr>
                </tbody>
<?php
 }
  ?>
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
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>

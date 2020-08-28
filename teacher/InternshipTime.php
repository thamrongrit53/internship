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

  <title>SB Admin - Dashboard</title>

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
      <li class="nav-item">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>หน้าแรก</span>
        </a>
      </li>
       <li class="nav-item ">
        <a class="nav-link" href="Record_internship.php">
          <i class="fas fa-fw fa-table"></i>
          <span>บันทึกฝึกงานนักศึกษา</span></a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="InternshipTime.php">
          <i class="fas fa-fw fa-table"></i>
          <span>บันทึกเวลาฝึกงาน</span></a>
      </li>
          <li class="nav-item">
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
            <a href="#">บันทึกเวลาฝึกงาน</a>
          </li>
          <li class="breadcrumb-item active">เวลาฝึกงาน</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ตาราง เวลาฝึกงาน
            <form method="post" action="export_internshiptime.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>รหัสนักศึกษา</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เข้างาน</th>
                    <th>ออกงาน</th>
                    <th>วันที่บันทึก</th>
                    <th>รายละเอียด</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>รหัสนักศึกษา</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เข้างาน</th>
                    <th>ออกงาน</th>
                    <th>วันที่บันทึก</th>
                    <th>รายละเอียด</th>
                  </tr>
                </tfoot>
              <?php
                $sql = "SELECT student.*,branch.*,work_time.* FROM student,branch,work_time
  WHERE student.branch_id = branch.branch_id AND student.std_id = work_time.std_id ORDER BY work_time.std_id DESC";
$query = mysqli_query($conn,$sql);

while ($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
?>

                <tbody>
                  <tr>
                    <td><?php echo $result["std_id"];?></td>
                    <td><?php echo $result["std_fname"];?>&nbsp;<?php echo $result["std_lname"];?></td>
                    <td><?php echo $result["wt_in_time"];?></td>
                    <td><?php echo $result["wt_out_time"];?></td>
                    <td><?php echo $result["wt_create_at"];?></td>
                    <td><center><a href="detail_work_time.php?id=<?php echo $result["std_id"];?>" class="btn btn-primary">รายละเอียด</a></center></td>
<?php } ?>
                    
                  </tr>
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
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

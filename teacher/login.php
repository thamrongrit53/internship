<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SBAC Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

</head>

<body class="bg-dark" style="font-family: 'Kanit', sans-serif;">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <center>
         <img src="img/sbac.jpg" style="width: 200px">
      </center>
      
      <div class="card-header"><center>Internship-System SBAC Login</center></div>
      <div class="card-body">
        <form method="POST" action="check_log.php">
          <div class="form-group">
            <div class="form-label-group">
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="อีเมล"  autofocus="autofocus">
              <label for="inputEmail">อีเมล</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="รหัสผ่าน" >
              <label for="inputPassword">รหัสผ่าน</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
         
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>

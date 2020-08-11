<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login :: เข้าสู่ระบบบันทึกการฝึกงาน</title>
  <link rel="stylesheet" href="css/style.css">
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="vendor/sweetalert2/sweetalert2.min.css">
</head>
<body>
  <div class="contianer login-page">
    <div class="container"><br></div>
    <div id="login_alert"></div>
    <div class="row mt-4">
      <div class="col-12 text-center">
        <div class="card card-login" >
          <div class="card-body">
            <div class="row">
              <div class="col-12 m-2 text-center">
                <img src="assets/logo.jpg" alt="" width="50%">
              </div>
            </div>
            <form id="login_form" mothod="POST">
              <div class="row">
                <div class="col-12">
                  <input type="text" class="form-control input-login input-user" name="username" id="username" placeholder="ชื่อผู้ใช้" autocomplete="on">
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <input type="password" class="form-control input-login input-pass" name="password" id="password" placeholder="รหัสผ่าน" autocomplete="off">
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <a href="index.php" class="btn btn-primary btn-block btn-login" id="login_btn">เข้าสู่ระบบ</a>
                  <!-- <input type="submit" value="เข้าสู่ระบบ" class="btn btn-primary btn-block btn-login"> -->
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-12 text-center mb-0">
                <p><a href="register.php" class="text-secondary">>>ลงทะเบียนนักศึกษาฝึกงาน<<</a></p>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-12 text-center">
                <small><a href="#" class="text-info">ลืมรหัสผ่าน</a></small>
              </div>
            </div> -->
          </div>
          <div class="card-footer text-center m-0 p-2">
            <small>วอศ.บริหารธุรกิจวิทยาสงขลา</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
  <script src="vendor/sweetalert2/sweetalert2.all.min.js"></script>

  <script src="js/script.js"></script>
</body>
</html>
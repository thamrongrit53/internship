<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>

<body class="bg-dark" style="font-family: 'Kanit', sans-serif;">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">ลงทะเบียน</div>
      <div class="card-body">
        <form  method="POST" action="check-register.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input  name="f_name" type="text" id="f_name" class="form-control" placeholder="ชื่อ"  autofocus="autofocus">
                  <label for="f_name">ชื่อ</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input  name="l_name" type="text" id="l_name" class="form-control" placeholder="นามสกุล" >
                  <label for="l_name">นามสกุล</label>
                </div>
              </div>
            </div>
          </div>
    
          <div class="form-group">
            <div class="form-label-group">
              <input name="email" type="text" id="email" class="form-control" placeholder="อีเมล"  >
              <label for="email">อีเมล</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input name="pass" type="password" id="pass" class="form-control" placeholder="รหัสผ่าน" >
                  <label for="pass">รหัสผ่าน</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input name="conf_pass" type="password" id="conf_pass" class="form-control" placeholder="ยืนยัน รหัสผ่าน"  >
                  <label for="conf_pass">ยืนยัน รหัสผ่าน</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
          <div class="col-md-6">
                <div class="form-label-group">
                  <input name="tel" type="text" id="tel" class="form-control" placeholder="เบอร์โทร"  >
                  <label for="tel">เบอร์โทร</label>
                </div>
              </div>
              </div>
              </div>

    <button class="btn btn-primary btn-block" type="submit">ลงทะเบียบ</button>  
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">เข้าสู่ระบบ</a>
        </div>
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

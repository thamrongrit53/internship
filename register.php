<?php 
session_start();

  include "./config/connect.php";
  $q_branch = "SELECT * FROM `branch` ORDER BY `branch_id`";
  $run_query = mysqli_query($conn, $q_branch);
  
  $inyr_q = "SELECT * FROM `intern_year` ORDER BY inyr_id DESC LIMIT 0,1 ";
  $run_inyr = mysqli_query($conn, $inyr_q);
  $inyr = mysqli_fetch_array($run_inyr);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register :: ลงทะเบียนนักศึกษาฝึกงาน</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendor/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
  <link rel="stylesheet" href="./js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
</head>
<body>
  <div class="container">
    <div class="container"><br></div>
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5>Register :: ลงทะเบียนนักศึกษาฝึกงาน</h5>
        </div>
        <div id="regis_alert"></div>
        <div class="card-body">
          <h6>บันทึกข้อมูลนักศึกษา</h6>
          <form class="was-validated" id="regis_form" method="POST">
            <div class="card">
              <div class="card-header">
                ข้อมูลส่วนตัว
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="std_prefix" value="นาย" checked>นาย
                        </label>
                      </div> 
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="std_prefix" value="นาง">นาง
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="std_prefix" value="นางสาว">นางสาว
                        </label>
                      </div>  
                    </div>
                    <div class="col-md-2">
                      <label for="std_year_lable">รุ่นปีที่ฝึกงาน:</label>
                      <select class="form-control" id="inyr_id" name="inyr_id" aria-readonly="true">
                        <option value="<?php echo $inyr["inyr_id"]; ?>"><?php echo $inyr["inyr_lable"]; ?></option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="uname">ชื่อ:</label>
                      <input type="text" class="form-control" id="std_fname" placeholder="ชื่อจริง" name="std_fname" required>
                    </div>
                    <div class="col-md-4">
                      <label for="std_lname">นามสกุล:</label>
                      <input type="text" class="form-control" id="std_lname" placeholder="นามสกุล" name="std_lname" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="std_id">รหัสประจำตัว:</label>
                      <input type="text" class="form-control" id="std_id" placeholder="รหัสประจำตัว" name="std_id" required>
                    </div>
                    <div class="col-md-4">
                      <label for="std_class">ระดับชั้น:</label>
                      <select class="form-control" id="std_class" name="std_class">
                        <option value="ปวช">ปวช.</option>
                        <option value="ปวส">ปวส.</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="branch_id">สาขาวิชา:</label>
                      <select class="form-control" id="branch_id" name="branch_id">
                        <?php
                          while($branch = mysqli_fetch_array($run_query, MYSQLI_ASSOC)) {
                            echo "<option value=".$branch['branch_id'].">".$branch['branch_name']."</option>"; 
                          }
                        ?>

                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="intd_start_date">เริ่มฝึกงานวันที่:</label>
                      <input type="date" class="form-control" id="intd_start_date" placeholder="" name="intd_start_date" required>
                    </div>
                    <div class="col-md-6">
                      <label for="intd_end_date">สิ้นสุดวันที่:</label>
                      <input type="date" class="form-control" id="intd_end_date" placeholder="" name="intd_end_date" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="intd_start_time">เวลาเข้างาน:</label>
                      <input type="time" class="form-control" id="intd_start_time" placeholder="" name="intd_start_time" required>
                    </div>
                    <div class="col-md-6">
                      <label for="intd_end_time">เวลาออกงาน:</label>
                      <input type="time" class="form-control" id="intd_end_time" placeholder="" name="intd_end_time" required>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-md-12">
                      <label for="std_photo">อัพโหลดรูปถ่ายนักศึกษาฝึกงาน:</label>
                      <div class="custom-file mb-3">
                        <input type="file" accept="image/jpeg" class="custom-file-input" id="std_photo" name="std_photo">
                        <label class="custom-file-label" for="std_photo">เลือกรูปถ่าย</label>
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="container"><br></div>
            <div class="card">
              <div class="card-header">
                ข้อมูลสถานประกอบการ
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="comp_name">ชื่อ:</label>
                      <input type="text" class="form-control" id="comp_name" placeholder="ชื่อสถานประกอบการ" name="comp_name" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <label for="comp_address_num">ที่อยู่เลขที่:</label>
                      <input type="text" class="form-control" id="comp_address_num" placeholder="ที่อยู่เลขที่" name="comp_address_num" required>
                    </div>
                    <div class="col-md-5">
                      <label for="comp_swine">หมู่:</label>
                      <input type="text" class="form-control" id="comp_swine" placeholder="หมู่" name="comp_swine" required>
                    </div>
                    <div class="col-md-5">
                      <label for="comp_road">ซอย/ถนน:</label>
                      <input type="text" class="form-control" id="comp_road" placeholder="ซอย/ถนน" name="comp_road" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="comp_canton">ตำบล:</label>
                      <input type="text" class="form-control" id="comp_canton" placeholder="ตำบล" name="comp_canton" required>
                    </div>
                    <div class="col-md-4">
                      <label for="comp_district">อำเภอ:</label>
                      <input type="text" class="form-control" id="comp_district" placeholder="อำเภอ" name="comp_district" required>
                    </div>
                    <div class="col-md-4">
                      <label for="comp_province">จังหวัด:</label>
                      <input type="text" class="form-control" id="comp_province" placeholder="จังหวัด" name="comp_province" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="comp_zipcode">รหัสไปรษณีย์:</label>
                      <input type="text" class="form-control" id="comp_zipcode" placeholder="รหัสไปรษณีย์" name="comp_zipcode" required>
                    </div>
                    <div class="col-md-4">
                      <label for="comp_tel">โทรศัพท์:</label>
                      <input type="text" class="form-control" id="comp_tel" placeholder="โทรศัพท์" name="comp_tel" required>
                    </div>
                    <div class="col-md-4">
                      <label for="comp_fax">โทรสาร:</label>
                      <input type="text" class="form-control" id="comp_fax" placeholder="โทรสาร" name="comp_fax" required>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-md-12">
                      <label for="comp_map">อัพโหลดรูปแผนที่บริษัท:</label>
                      <div class="custom-file mb-3">
                        <input type="file" accept="image/jpeg" class="custom-file-input" id="comp_map" name="comp_map">
                        <label class="custom-file-label" for="comp_map">เลือก</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="comp_chart">อัพโหลดรูปผังองค์กร:</label>
                      <div class="custom-file mb-3">
                        <input type="file" accept="image/jpeg" class="custom-file-input" id="comp_chart" name="comp_chart">
                        <label class="custom-file-label" for="comp_chart">เลือก</label>
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="container"><br></div>
            <div class="card">
              <div class="card-header">
                ข้อมูลทั่วไปนักศึกษา
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <p><strong>ที่อยู่ขณะฝึกงาน</strong></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <label for="std_address_num">ที่อยู่เลขที่:</label>
                      <input type="text" class="form-control" id="std_address_num" placeholder="ที่อยู่เลขที่" name="std_address_num" required>
                    </div>
                    <div class="col-md-5">
                      <label for="std_swine">หมู่:</label>
                      <input type="text" class="form-control" id="std_swine" placeholder="หมู่" name="std_swine" required>
                    </div>
                    <div class="col-md-5">
                      <label for="std_road">ซอย/ถนน:</label>
                      <input type="text" class="form-control" id="std_road" placeholder="ซอย/ถนน" name="std_road" required>   
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="std_canton">ตำบล:</label>
                      <input type="text" class="form-control" id="std_canton" placeholder="ตำบล" name="std_canton" required>
                    </div>
                    <div class="col-md-4">
                      <label for="std_district">อำเภอ:</label>
                      <input type="text" class="form-control" id="std_district" placeholder="อำเภอ" name="std_district" required>
                    </div>
                    <div class="col-md-4">
                      <label for="std_province">จังหวัด:</label>
                      <input type="text" class="form-control" id="std_province" placeholder="จังหวัด" name="std_province" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="std_zipcode">รหัสไปรษณีย์:</label>
                      <input type="text" class="form-control" id="std_zipcode" placeholder="รหัสไปรษณีย์" name="std_zipcode" required>
                    </div>
                    <div class="col-md-6">
                      <label for="std_tel">โทรศัพท์:</label>
                      <input type="text" class="form-control" id="std_tel" placeholder="โทรศัพท์" name="std_tel" required>
                    </div>
                  </div>                
                </div>
                <hr>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <p><strong>โรคประจำตัว</strong></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="std_disease">ระบุโรคประจำตัว:</label>
                      <input type="text" class="form-control" id="std_disease" placeholder="โรคประจำตัว" name="std_disease" required>
                    </div>
                    <div class="col-md-6">
                      <label for="std_blood_type">กลุ่มเลือด:</label>
                      <select class="form-control" id="std_blood_type" name="std_blood_type">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                      </select>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <p><strong>ผู้ปกครอง</strong></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="parent_name">ชื่อ - สกุล:</label>
                      <input type="text" class="form-control" id="parent_name" placeholder="ชื่อ - สกุล ผู้ปกครอง" name="parent_name" required>
                    </div>
                    <div class="col-md-6">
                      <label for="parent_related">เกี่ยวข้องเป็น:</label>
                      <input type="text" class="form-control" id="parent_related" placeholder="เกี่ยวข้องเป็น" name="parent_related" required>  
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <label for="parent_address_num">ที่อยู่เลขที่:</label>
                      <input type="text" class="form-control" id="parent_address_num" placeholder="ที่อยู่เลขที่" name="parent_address_num" required>
                    </div>
                    <div class="col-md-5">
                      <label for="parent_swine">หมู่:</label>
                      <input type="text" class="form-control" id="parent_swine" placeholder="หมู่" name="parent_swine" required>
                    </div>
                    <div class="col-md-5">
                      <label for="parent_road">ซอย/ถนน:</label>
                      <input type="text" class="form-control" id="parent_road" placeholder="ซอย/ถนน" name="parent_road" required>  
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="parent_canton">ตำบล:</label>
                      <input type="text" class="form-control" id="parent_canton" placeholder="ตำบล" name="parent_canton" required>
                    </div>
                    <div class="col-md-4">
                      <label for="parent_district">อำเภอ:</label>
                      <input type="text" class="form-control" id="parent_district" placeholder="อำเภอ" name="parent_district" required>
                    </div>
                    <div class="col-md-4">
                      <label for="parent_province">จังหวัด:</label>
                      <input type="text" class="form-control" id="parent_province" placeholder="จังหวัด" name="parent_province" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="parent_zipcode">รหัสไปรษณีย์:</label>
                      <input type="text" class="form-control" id="parent_zipcode" placeholder="รหัสไปรษณีย์" name="parent_zipcode" required> 
                    </div>
                    <div class="col-md-6">
                      <label for="parent_tel">โทรศัพท์:</label>
                      <input type="text" class="form-control" id="parent_tel" placeholder="โทรศัพท์" name="parent_tel" required> 
                    </div>
                  </div>                  
                </div>
                <hr>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <p><strong>ผู้ติดต่อกรณีฉุกเฉิน</strong></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="emer_name">ชื่อ - สกุล:</label>
                      <input type="text" class="form-control" id="emer_name" placeholder="ชื่อ - สกุล" name="emer_name" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <label for="emer_address_num">ที่อยู่เลขที่:</label>
                      <input type="text" class="form-control" id="emer_address_num" placeholder="ที่อยู่เลขที่" name="emer_address_num" required>
                    </div>
                    <div class="col-md-5">
                      <label for="emer_swine">หมู่:</label>
                      <input type="text" class="form-control" id="emer_swine" placeholder="หมู่" name="emer_swine" required>
                    </div>
                    <div class="col-md-5">
                      <label for="emer_road">ซอย/ถนน:</label>
                      <input type="text" class="form-control" id="emer_road" placeholder="ซอย/ถนน" name="emer_road" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <label for="emer_canton">ตำบล:</label>
                      <input type="text" class="form-control" id="emer_canton" placeholder="ตำบล" name="emer_canton" required>
                    </div>
                    <div class="col-md-4">
                      <label for="emer_district">อำเภอ:</label>
                      <input type="text" class="form-control" id="emer_district" placeholder="อำเภอ" name="emer_district" required>
                    </div>
                    <div class="col-md-4">
                      <label for="emer_province">จังหวัด:</label>
                      <input type="text" class="form-control" id="emer_province" placeholder="จังหวัด" name="emer_province" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="emer_zipcode">รหัสไปรษณีย์:</label>
                      <input type="text" class="form-control" id="emer_zipcode" placeholder="รหัสไปรษณีย์" name="emer_zipcode" required>
                    </div>
                    <div class="col-md-6">
                      <label for="emer_tel">โทรศัพท์:</label>
                      <input type="text" class="form-control" id="emer_tel" placeholder="โทรศัพท์" name="emer_tel" required>
                    </div>
                  </div>                  
                </div>
              </div>
            </div>
            <div class="container"><br></div>
       <div class="card">
              <div class="card-header">
                เช็คอินสถานที่ฝึกงาน
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="std_pass">latitude:</label>
                      <input type="text" class="form-control" id="lat" name="lat" readonly>
                    </div>
                    <div class="col-md-6">
                      <label for="re_std_pass">longitude:</label>
                      <input type="text" class="form-control" id="lng" name="lng" readonly>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-12">
                    <button type="button" class="btn btn-danger" onclick="getLocation()">เช็คอิน</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="container"><br></div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary" id="regis_btn">สมัครฝึกงาน</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="card-footer text-center m-0 p-2">
          <small>วอศ.บริหารธุรกิจวิทยาสงขลา</small>
        </div>
      </div>
    </div>
    <div class="container"><br></div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="vendor/sweetalert2/sweetalert2.all.min.js"></script>

  <script src="js/script.js"></script>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
  <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
  
  <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="./js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
  <script type="text/javascript" src="./js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
  
  <script type="text/javascript" src="./js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

  <script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  $.Thailand({
    database: './js/jquery.Thailand.js/database/db.json',
    $district: $('#comp_canton'), // input ของตำบล
    $amphoe: $('#comp_district'), // input ของอำเภอ
    $province: $('#comp_province'), // input ของจังหวัด
    $zipcode: $('#comp_zipcode'), // input ของรหัสไปรษณีย์
  });
  $.Thailand({
    database: './js/jquery.Thailand.js/database/db.json',
    $district: $('#std_canton'), // input ของตำบล
    $amphoe: $('#std_district'), // input ของอำเภอ
    $province: $('#std_province'), // input ของจังหวัด
    $zipcode: $('#std_zipcode'), // input ของรหัสไปรษณีย์
  });
  $.Thailand({
    database: './js/jquery.Thailand.js/database/db.json',
    $district: $('#parent_canton'), // input ของตำบล
    $amphoe: $('#parent_district'), // input ของอำเภอ
    $province: $('#parent_province'), // input ของจังหวัด
    $zipcode: $('#parent_zipcode'), // input ของรหัสไปรษณีย์
  });
  $.Thailand({
    database: './js/jquery.Thailand.js/database/db.json',
    $district: $('#emer_canton'), // input ของตำบล
    $amphoe: $('#emer_district'), // input ของอำเภอ
    $province: $('#emer_province'), // input ของจังหวัด
    $zipcode: $('#emer_zipcode'), // input ของรหัสไปรษณีย์
  });
</script>
</body>


</html>
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
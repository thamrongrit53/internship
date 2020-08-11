<?php

$img_query = "SELECT student.std_photo, company.comp_map, company.comp_chart 
              FROM student, company 
              WHERE student.std_id='$std_id' AND company.std_id = '$std_id' ";
$img_run_q = mysqli_query($conn, $img_query);
$img = mysqli_fetch_array($img_run_q);
?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">อัพโหลดรูปภาพ</h1>
<div id="upload_alert"></div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">อัพโหลดรูปภาพ</h6>
  </div>
  <div class="card-body">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">รูปถ่ายนักศึกษาฝึกงาน</h6>
      </div>
      <div class="card-body">
        <form id="up_std_form" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <div class="row">
            <?php
            if($img["std_photo"] == 0) {
              echo '
              <div class="col-md-10">
                <label for="image">อัพโหลดรูปถ่ายนักศึกษาฝึกงาน:</label>
                <div class="custom-file mb-3">
                  <input type="file" accept="image/jpeg" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="image">เลือกรูปภาพ</label>
                </div>
              </div>';
            } else {
              echo '
              <div class="col-md-10">
                <label for="image">อัพโหลดรูปถ่ายนักศึกษาฝึกงาน:</label>
                <div class="custom-file mb-3">
                  <input type="file" accept="image/jpeg" class="custom-file-input" id="image" name="image" disabled>
                  <label class="custom-file-label" for="image">อัพโหลดรูปภาพแล้ว</label>
                </div>
              </div>';
            }
            ?>
              <input type="hidden" name="action" id="action" value="up_std" />
              <div class="col-md-2 mt-2">
                <br>
                <?php
                if($img["std_photo"] == 0) {
                  echo '
                  <button type="submit" class="btn btn-primary" id="up_std_btn">
                    <i class="fas fa-cloud-upload-alt"></i> UPLOAD
                  </button>
                  ';
                } else {
                  echo '
                  <a class="btn btn-success text-light disabled"><i class="fas fa-check-circle"></i> SUCCESS</a>
                  <a class="btn btn-danger text-light" onclick="onDelStd('.$std_id.')"><i class="fas fa-trash"></i></a>
                  ';
                }
                ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">แผนที่ตั้งของสถานประกอบการ</h6>
      </div>
      <div class="card-body">
        <form id="up_map_form" method="POST">
          <div class="form-group">
            <div class="row">
            <?php
            if($img["comp_map"] == 0) {
              echo '
              <div class="col-md-10">
                <label for="image">อัพโหลดแผนที่ตั้งของสถานประกอบการ:</label>
                <div class="custom-file mb-3">
                  <input type="file" accept="image/jpeg" class="custom-file-input" id="image_map" name="image">
                  <label class="custom-file-label" for="image">เลือกรูปภาพ</label>
                </div>
              </div>';
            } else {
              echo '
              <div class="col-md-10">
                <label for="image">อัพโหลดแผนที่ตั้งของสถานประกอบการ:</label>
                <div class="custom-file mb-3">
                  <input type="file" accept="image/jpeg" class="custom-file-input" id="image_map" name="image" disabled>
                  <label class="custom-file-label" for="image">อัพโหลดรูปภาพแล้ว</label>
                </div>
              </div>';
            }
            ?>
              <input type="hidden" name="action" id="action" value="up_map" />
              <div class="col-md-2 mt-2">
                <br>
                <?php
                if($img["comp_map"] == 0) {
                  echo '
                  <button type="submit" class="btn btn-primary" id="up_map_btn">
                    <i class="fas fa-cloud-upload-alt"></i> UPLOAD
                  </button>
                  ';
                } else {
                  echo '
                  <a class="btn btn-success text-light disabled"><i class="fas fa-check-circle"></i> SUCCESS</a>
                  <a class="btn btn-danger text-light" onclick="onDelMap('.$std_id.')"><i class="fas fa-trash"></i></a>
                  ';
                }
                ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">ผังองค์กร</h6>
      </div>
      <div class="card-body">
        <form id="up_chart_form" method="POST">
          <div hidden><input type="text" name="chart" value="1"></div>
          <div class="form-group">
            <div class="row">
            <?php
            if($img["comp_chart"] == 0) {
              echo '
              <div class="col-md-10">
                <label for="image">อัพโหลดผังองค์กร:</label>
                <div class="custom-file mb-3">
                  <input type="file" accept="image/jpeg" class="custom-file-input" id="image_chart" name="image">
                  <label class="custom-file-label" for="image">เลือกรูปภาพ</label>
                </div>
              </div>';
            } else {
              echo '
              <div class="col-md-10">
                <label for="image">อัพโหลดผังองค์กร:</label>
                <div class="custom-file mb-3">
                  <input type="file" accept="image/jpeg" class="custom-file-input" id="image_chart" name="image" disabled>
                  <label class="custom-file-label" for="image">อัพโหลดรูปภาพแล้ว</label>
                </div>
              </div>';
            }
            ?>
              <input type="hidden" name="action" id="action" value="up_chart" />
              <div class="col-md-2 mt-2">
                <br>
                <?php
                if($img["comp_chart"] == 0) {
                  echo '
                  <button type="submit" class="btn btn-primary" id="up_chart_btn">
                    <i class="fas fa-cloud-upload-alt"></i> UPLOAD
                  </button>
                  ';
                } else {
                  echo '
                  <a class="btn btn-success text-light disabled"><i class="fas fa-check-circle"></i> SUCCESS</a>
                  <a class="btn btn-danger text-light" onclick="onDelChart('.$std_id.')"><i class="fas fa-trash"></i></a>
                  ';
                }
                ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script>
  // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  $("#up_std_form").submit((event) => {
    event.preventDefault();
    var img_name = $("#image").val();

    if(img_name == "") {
      Swal.fire({
        type: 'warning',
        title: 'กรุณาตรวจสอบ',
        text: 'ไม่มีรูปภาพที่ถูกเลือก กรุณาตรวจสอบใหม่อีกครั้ง'
      });
      return false;
    } else {
      var extension = $("#image").val().split('.').pop().toLowerCase();
      if(jQuery.inArray(extension, ['jpg', 'jpeg']) == -1){
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'สามารถอัพโหลดได้เฉพาะรูปภาพ .jpg หรือ .jpeg เท่านั้น กรุณาตรวจสอบใหม่อีกครั้ง'
        });
        $("#image").val('');
        return false;
      } else {
        let form = $("#up_std_form");
        let formData = new FormData(form[0]);
        $.ajax({
          url: "action_register_upload.php",
          method: "POST",
          data: formData,
          contentType:false,
          processData:false,
          success: (data) => {
            $("#upload_alert").html(data);
          }
        });
      }
    }
  });

  $("#up_map_form").submit((event) => {
    event.preventDefault();
    var img_name = $("#image_map").val();

    if(img_name == "") {
      Swal.fire({
        type: 'warning',
        title: 'กรุณาตรวจสอบ',
        text: 'ไม่มีรูปภาพที่ถูกเลือก กรุณาตรวจสอบใหม่อีกครั้ง'
      });
      return false;
    } else {
      var extension = $("#image_map").val().split('.').pop().toLowerCase();
      if(jQuery.inArray(extension, ['jpg', 'jpeg']) == -1){
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'สามารถอัพโหลดได้เฉพาะรูปภาพ .jpg หรือ .jpeg เท่านั้น กรุณาตรวจสอบใหม่อีกครั้ง'
        });
        $("#image_map").val('');
        return false;
      } else {
        let form = $("#up_map_form");
        let formData = new FormData(form[0]);
        $.ajax({
          url: "action_register_upload.php",
          method: "POST",
          data: formData,
          contentType:false,
          processData:false,
          success: (data) => {
            $("#upload_alert").html(data);
          }
        });
      }
    }
  });

  $("#up_chart_form").submit((event) => {
    event.preventDefault();
    var img_name = $("#image_chart").val();

    if(img_name == "") {
      Swal.fire({
        type: 'warning',
        title: 'กรุณาตรวจสอบ',
        text: 'ไม่มีรูปภาพที่ถูกเลือก กรุณาตรวจสอบใหม่อีกครั้ง'
      });
      return false;
    } else {
      var extension = $("#image_chart").val().split('.').pop().toLowerCase();
      if(jQuery.inArray(extension, ['jpg', 'jpeg']) == -1){
        Swal.fire({
          type: 'warning',
          title: 'กรุณาตรวจสอบ',
          text: 'สามารถอัพโหลดได้เฉพาะรูปภาพ .jpg หรือ .jpeg เท่านั้น กรุณาตรวจสอบใหม่อีกครั้ง'
        });
        $("#image_chart").val('');
        return false;
      } else {
        let form = $("#up_chart_form");
        let formData = new FormData(form[0]);
        $.ajax({
          url: "action_register_upload.php",
          method: "POST",
          data: formData,
          contentType:false,
          processData:false,
          success: (data) => {
            $("#upload_alert").html(data);
          }
        });
      }
    }
  });

</script>

<script>

function onDelStd(id){
  
  if(confirm('Confirm Delete?')==true) {
    // console.log(id);
    window.location.href = "index.php?page=action_del_upload&&del_id=" + id + "&&action=std";
  }
}

function onDelMap(id){
  
  if(confirm('Confirm Delete?')==true) {
    // console.log(id);
    window.location.href = "index.php?page=action_del_upload&&del_id=" + id + "&&action=map";
  }
}

function onDelChart(id){
  
  if(confirm('Confirm Delete?')==true) {
    // console.log(id);
    window.location.href = "index.php?page=action_del_upload&&del_id=" + id + "&&action=chart";
  }
}

</script>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">การตั้งค่า</h1>
<div id="chx_pass_alert"></div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">การตั้งค่าทั่วไป</h6>
  </div>
  <div class="card-body">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">เปลี่ยนรหัสผ่าน</h6>
      </div>
      <div class="card-body">
        <form id="chx_pass_form" method="POST">
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="old_pass">รหัสผ่านเดิม:</label>
                <input type="password" class="form-control" id="old_pass" placeholder="รหัสผ่านเดิม" name="old_pass" min="8" required>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <label for="std_pass">รหัสผ่านใหม่:</label>
                <input type="password" class="form-control" id="std_pass" placeholder="รหัสผ่านใหม่" name="std_pass" min="8" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="re_std_pass">ยืนยันรหัสผ่านใหม่:</label>
                <input type="password" class="form-control" id="re_std_pass" placeholder="ยืนยันรหัสผ่านใหม่" name="re_std_pass" min="8" required>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-12">
                <small class="text-danger">หมายเหตุ: รหัสผ่านควรมีความยาวไม่น้อยกว่า 8 ตัวอักษร</small>
              </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary" id="chx_pass_btn">SUBMIT</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

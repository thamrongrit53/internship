<?php

$led_id = $_GET["id"];
$led_query = "SELECT * FROM `lesson_learn_detail` WHERE `std_id`='$std_id' AND `led_id`='$led_id' ";
$run_query_led = mysqli_query($conn, $led_query);
$led = mysqli_fetch_array($run_query_led);

$ans_q = "SELECT lesson_learn_ans.* ,lesson_learn.* 
          FROM `lesson_learn_ans` 
          INNER JOIN `lesson_learn` 
          WHERE lesson_learn_ans.les_id = lesson_learn.les_id
          AND std_id = '$std_id' ";
$run_ans_q = mysqli_query($conn, $ans_q);
?>

<h1 class="h3 mb-2 text-gray-800">บันทึกการฝึกงานภายนอก</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><span><a href="index.php?page=lesson_learn">Lesson Learn</a></span> / แก้ไขข้อมูล Lesson Learn</h6>
  </div>
  <div class="card-body">
    <div id="les_edit_alert"></div>
    <form id="les_edit_form" method="POST">
      <div class="form-group" hidden>
        <label for="led_id">รหัส</label>
        <input type="text" class="form-control" name="led_id" id="led_id" value="<?php echo $led["led_id"]; ?>" >
      </div>
      <?php 
        $origDate = $led["led_date"]; 
        $led_date = date("d/m/Y", strtotime($origDate));
      ?>
      <div class="form-group">
        <label for="date">วัน/เดือน/ปี</label>
        <input type="date" class="form-control" name="date" id="date" value="<?php echo $led["led_date"]; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="led_issue"><u>Lesson Learn</u> ปัญหาที่พบ</label>
        <textarea class="form-control" name="led_issue" id="led_issue" rows="5" style="resize: none;"><?php echo $led["led_issue"]; ?></textarea>
      </div>
      <div class="form-group">
        <label for="led_exp">สิ่งที่เรียนรู้</label>
        <textarea class="form-control" name="led_exp" id="led_exp" rows="5" style="resize: none;"><?php echo $led["led_exp"]; ?></textarea>
      </div>
      <div class="form-group">
        <label for="led_solve">วิธีการป้องกันและแก้ปัญหาไม่ให้เกิดซ้ำ</label>
        <textarea class="form-control" name="led_solve" id="led_solve" rows="5" style="resize: none;"><?php echo $led["led_solve"]; ?></textarea>
      </div>
      <hr>
      <h6><strong>เกี่ยวกับด้าน</strong></h6>
      <?php 
      $less_query = "SELECT * FROM `lesson_learn` ORDER BY `les_id` LIMIT 6";
      $run_query_less = mysqli_query($conn, $less_query);
      while($les = mysqli_fetch_array($run_ans_q, MYSQLI_ASSOC)){
        if($les["ans_result"] == 1){
          echo '
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultChecked'.$les["les_id"].'" name="ans'.$les["les_id"].'" value="1" checked>
            <label class="custom-control-label" for="defaultChecked'.$les["les_id"].'">'.$les["les_lable_th"].'</label>
          </div>';
        } else {
          echo '
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultChecked'.$les["les_id"].'" name="ans'.$les["les_id"].'" value="1">
            <label class="custom-control-label" for="defaultChecked'.$les["les_id"].'">'.$les["les_lable_th"].'</label>
          </div>';
        }
      }
      ?>
      <hr>
      <button class="btn btn-primary" type="submit" id="les_edit_btn">บันทึก</button>
    </form>
  </div>
</div>

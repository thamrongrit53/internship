<?php

$led_id = $_GET["id"];
$led_query = "SELECT * FROM `lesson_learn_detail` WHERE `std_id`='$std_id' AND `led_id`='$led_id' ";
$run_query_led = mysqli_query($conn, $led_query);
$led = mysqli_fetch_array($run_query_led);

$ans_q = "SELECT lesson_learn_ans.* ,lesson_learn.* 
          FROM `lesson_learn_ans` 
          INNER JOIN `lesson_learn` 
          WHERE lesson_learn_ans.les_id = lesson_learn.les_id
          AND std_id = '$std_id' 
          AND lesson_learn_ans.ans_result = 1";
$run_ans_q = mysqli_query($conn, $ans_q);
?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Lesson Learn</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary"><span><a href="index.php?page=lesson_learn">Lesson Learn</a></span> / ข้อมูล Lesson Learn</h6>
    <div>
      <?php echo '
      <a href="index.php?page=edit_les&&id='.$led['led_id'].'" class="btn btn-primary">
        <i class="fas fa-wrench"></i> แก้ไข
      </a> ';
      ?>
    </div>
  </div>
  <div class="card-body">
    <?php 
    $origDate = $led["led_date"]; 
    $led_date = date("d/m/Y", strtotime($origDate));
    echo '
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>วัน/เดือน/ปี</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$led_date.'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>ปัญหาที่พบ</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$led['led_issue'].'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>สิ่งที่เรียนรู้</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$led['led_exp'].'</p>
      </div>
    </div>
    <hr>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>วิธีการป้องกันและแก้ปัญหาไม่ให้เกิดซ้ำ</strong></h6>
      </div>
      <div class="col-md-9">
        <p>'.$led['led_solve'].'</p>
      </div>
    </div>
    <hr>
    '; ?>
    <div class="row mb-2">
      <div class="col-md-3">
        <h6><strong>เกี่ยวข้องกับด้าน</strong></h6>
      </div>
      <div class="col-md-9">
        <?php while($ans = mysqli_fetch_array($run_ans_q, MYSQLI_ASSOC)){
          echo '<p>'.$ans['les_lable_th'].' ('.$ans['les_lable_en'].')</p>';
        }
        ?>
      </div>
    </div>
    <hr>
  </div>
</div>
<?php mysqli_close($conn); ?>

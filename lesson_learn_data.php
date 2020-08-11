<?php 
include "./config/connect.php";
session_start();
$std_id = $_SESSION["std_id"];

$les_sql = "SELECT * FROM `lesson_learn` ORDER BY `les_id` LIMIT 6";
$les_q = mysqli_query($conn, $les_sql);

$s_sum1 = "SELECT SUM(ans_result) total FROM `lesson_learn_ans` WHERE `std_id`='$std_id' AND `les_id`='1' ";
$s_sum2 = "SELECT SUM(ans_result) total FROM `lesson_learn_ans` WHERE `std_id`='$std_id' AND `les_id`='2' ";
$s_sum3 = "SELECT SUM(ans_result) total FROM `lesson_learn_ans` WHERE `std_id`='$std_id' AND `les_id`='3' ";
$s_sum4 = "SELECT SUM(ans_result) total FROM `lesson_learn_ans` WHERE `std_id`='$std_id' AND `les_id`='4' ";
$s_sum5 = "SELECT SUM(ans_result) total FROM `lesson_learn_ans` WHERE `std_id`='$std_id' AND `les_id`='5' ";
$s_sum6 = "SELECT SUM(ans_result) total FROM `lesson_learn_ans` WHERE `std_id`='$std_id' AND `les_id`='6' ";

$q_sum1 = mysqli_query($conn, $s_sum1);
$q_sum2 = mysqli_query($conn, $s_sum2);
$q_sum3 = mysqli_query($conn, $s_sum3);
$q_sum4 = mysqli_query($conn, $s_sum4);
$q_sum5 = mysqli_query($conn, $s_sum5);
$q_sum6 = mysqli_query($conn, $s_sum6);

$r_sum1 = mysqli_fetch_array($q_sum1);
$r_sum2 = mysqli_fetch_array($q_sum2);
$r_sum3 = mysqli_fetch_array($q_sum3);
$r_sum4 = mysqli_fetch_array($q_sum4);
$r_sum5 = mysqli_fetch_array($q_sum5);
$r_sum6 = mysqli_fetch_array($q_sum6);

$i = 0;
while($les_r = mysqli_fetch_array($les_q)) {
  $lables[$i] = $les_r["les_lable_en"]."(".$les_r["les_lable_th"].")";
  $i++;
}

$sum1 = $r_sum1["total"];
$sum2 = $r_sum2["total"];
$sum3 = $r_sum3["total"];
$sum4 = $r_sum4["total"];
$sum5 = $r_sum5["total"];
$sum6 = $r_sum6["total"];
?>
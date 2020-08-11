<?php  
//export.php  
include "connect.php";
$ans;
$output = '';
if(isset($_POST["export"]))
{
    $sql = "SELECT student.*,branch.*,leaves.* FROM student,branch,leaves
    WHERE student.branch_id = branch.branch_id AND student.std_id = leaves.std_id";
  $query = mysqli_query($conn,$sql);
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>รหัสนักศึกษา</th>
                    <th>ชื่อ</th>
                    <th>ระดับชั้น</th>
                    <th>สาขา</th>
                    <th>ประเภท</th>
                    <th>เหตุผลการลา</th>
                    <th>ตั้งแต่วันที่</th>
                    <th>ถึงวันที่</th>
                     <th>เป็นเวลา/วัน</th>
                     <th>สถานะ</th>
                  
     
                    </tr>
  ';
  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
  {
    if($result["lev_approved"] == 1){ $ans="อนุมัติ";} else{ $ans= "ไม่อนุมัติ";}
   $output .= '
    <tr>  
                     <td>'.$result["std_id"].'</td>
                     <td>'.$result["std_fname"].' &nbsp; '.$result["std_lname"].'</td>
                    <td>'.$result["std_class"].'</td>
                    <td>'.$result["branch_name"].'</td>
                    <td>'.$result["lev_type"].'</td>
                    <td>'.$result["lev_reason"].'</td>
                    <td>'.$result["lev_first_day"].'</td>
                    <td>'.$result["lev_last_day"].'</td>
                    <td>'.$result["lev_sum_day"].'</td>
                    <td>'.$ans.'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=export.xls");
header("Pragma: no-cache");
header("Expires: 0");
  echo $output;
 }
}
?>

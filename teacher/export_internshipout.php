<?php  
//export.php  
include "connect.php";
$output = '';
if(isset($_POST["export"]))
{
    $sql = "SELECT student.*,branch.*,ext_intern.* FROM student,branch,ext_intern
    WHERE student.branch_id = branch.branch_id AND student.std_id = ext_intern.std_id ";
  $query = mysqli_query($conn,$sql);
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>รหัสนักศึกษา</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่</th>
                    <th>ประเภทงาน</th>
                    <th>รายละเอียด</th>
                    <th>ผู้มอบหมาย</th>
                  
     
                    </tr>
  ';
  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
  {
   $output .= '
    <tr>            
                    <td>'.$result["std_id"].'</td>
                     <td>'.$result["std_fname"].' &nbsp; '.$result["std_lname"].'</td>
                    <td>'.$result["ext_date"].'</td>
                    <td>'.$result["ext_job"].'</td>
                    <td>'.$result["ext_detail"].'</td>
                    <td>'.$result["ext_assigner"].'</td>
                    
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

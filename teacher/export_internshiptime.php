<?php  
//export.php  
include "connect.php";
$output = '';
if(isset($_POST["export"]))
{
    $sql = "SELECT student.*,branch.*,work_time.* FROM student,branch,work_time
    WHERE student.branch_id = branch.branch_id AND student.std_id = work_time.std_id";
  $query = mysqli_query($conn,$sql);
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>รหัสนักศึกษา</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เข้างาน</th>
                    <th>ออกงาน</th>
                    <th>วันที่บันทึก</th>
                  
     
                    </tr>
  ';
  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
  {
   $output .= '
    <tr>             
                    <td>'.$result["std_id"].'</td>
                    <td>'.$result["std_fname"].' &nbsp; '.$result["std_lname"].'</td>
                    <td>'.$result["wt_in_time"].'</td>
                    <td>'.$result["wt_out_time"].'</td>
                    <td>'.$result["wt_create_at"].'</td>
        
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

<?php  
//export.php  
include "connect.php";
$output = '';
if(isset($_POST["export"]))
{
    $sql = "SELECT student.*,branch.* FROM student,branch WHERE student.branch_id = branch.branch_id";
    $query = mysqli_query($conn,$sql);
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>รหัสนักศึกษา</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชั้น</th>
                    <th>สาขา</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์โทร</th>
                  
     
                    </tr>
  ';
  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
  {
   $output .= '
    <tr>  
    <td>'.$result["std_id"].'</td>
    <td>'.$result["std_fname"].' &nbsp; '.$result["std_lname"].'</td>
    <td>'.$result["std_class"].'</td>
    <td>'.$result["branch_name"].'</td>
    <td>'.$result["std_address_num"].'</td>
    <td>'.$result["std_tel"].'</td>
                    
                   
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

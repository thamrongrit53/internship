<?php  
//export.php  
include "connect.php";
$output = '';
if(isset($_POST["export"]))
{
    $id=$_GET["id"];
    $sql = "SELECT student.*,branch.*,work_detail.* FROM student,branch,work_detail
    WHERE student.branch_id = branch.branch_id AND student.std_id = work_detail.std_id AND work_detail.std_id ='$id'";
  $query = mysqli_query($conn,$sql);
 if(mysqli_num_rows($query) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th>ชื่อ-นามสกุล</th>
                    <th>สัปดาห์ที่</th>
                    <th>วันที่</th>
                    <th>ถึงวันที่</th>
                    <th>หน่วยงานที่ปฏิบัติงาน</th>
                    <th>งานที่ปฏิบัติ</th>
                    <th>ปัญหาที่พบ</th>
                    <th>วิธีการแก้ปัญหา</th>
                    <th>ประสบการณ์/ความรู้ที่ได้รับ</th>
                    <th>วิธีการป้องกันและแก้ไขไม่ให้เกิดซ้ำ</th>
                    <th>ข้อเสนอแนะ</th>
                  
     
                    </tr>
  ';
  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
  {
   $output .= '
    <tr>  
    <td>'.$result["std_fname"].' &nbsp; '.$result["std_lname"].'</td>
                    <td>'.$result["wd_week"].'</td>
                    <td>'.$result["wd_first_day"].'</td>
                    <td>'.$result["wd_last_day"].'</td>
                    <td>'.$result["wd_dept"].'</td>
                    <td>'.$result["wd_job"].'</td>
                    <td>'.$result["wd_issue"].'</td>
                    <td>'.$result["wd_fix"].'</td>
                    <td>'.$result["wd_exp"].'</td>
                    <td>'.$result["wd_solve"].'</td>
                    <td>'.$result["wd_comment"].'</td>
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

<?php
require ('db.php');

$course=$_POST['course'];
$class_name=$_POST['class_name'];
$class_time=$_POST['class_time'];
$start_date=$_POST['start_date'];
$whatsappLink=$_POST['whatsappLink'];

$studentName=$_POST['studentName'];
$mobile=$_POST['mobile'];
$gmail=$_POST['gmail'];
$referBy=$_POST['referBy'];
$description=$_POST['description'];

$join_date=$_POST['join_date'];

$batchId=$_POST['batchId'];

$action='Active';

$end_date=$_POST['end_date'];


$res = mysqli_query($conn,"Select * from student where class_name='$class_name'");  
$no = mysqli_num_rows($res)+1;

$studentId= "SID0" . $no;


$sql="INSERT INTO `student`(`studentId`, `studentName`, `mobile`, `gmail`, `referBy`, `description`, `course`, `class_name`, `class_time`, `start_date`, `whatsappLink`, `join_date`, `action`, `end_date`) VALUES('$studentId','$studentName','$mobile','$gmail','$referBy','$description','$course', '$class_name','$class_time','$start_date','$whatsappLink','$join_date','$action','$end_date')";

	
if($conn->query($sql)==TRUE)
{
echo "<script>alert('Added Successfully!');</script>";
echo "<script type='text/javascript'>
window.location.href = 'studentDetails.php?id=$batchId';  
</script>";
}
else
{
	
echo "Error: ".$sql."<br>".$conn->error;

}
	?>
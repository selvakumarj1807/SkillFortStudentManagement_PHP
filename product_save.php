<?php
require ('db.php');

$course=$_POST['course'];

$class_time=$_POST['class_time'];
$start_date=$_POST['start_date'];
$whatsappLink=$_POST['whatsappLink'];
$end_date='';

$res = mysqli_query($conn,"Select * from products where course='$course'");  
$no = mysqli_num_rows($res)+1;

$class_name= $course . " Batch " . $no;


$sql="INSERT INTO `products`(`course`, `batch_number`, `class_name`, `class_time`, `start_date`, `end_date`, `whatsappLink`) VALUES('$course','$no','$class_name','$class_time','$start_date','$end_date','$whatsappLink')";

	
if($conn->query($sql)==TRUE)
{
echo "<script>alert('Added Successfully!');</script>";
echo "<script type='text/javascript'>
window.location.href = 'product.php?category=$course';
</script>";
}
else
{
	
echo "Error: ".$sql."<br>".$conn->error;

}
	?>
<?php
	require('db.php');
	$id=$_REQUEST['id'];
	$class_name=$_REQUEST['class_name'];
	if (isset($_REQUEST['class_id'])) {
		$class_id = $_REQUEST['class_id'];
	}



$sql="DELETE FROM `student` WHERE id='$id'";
if($conn->query($sql)==TRUE) 
{
echo "<script>alert('Deleted Successfully!');</script>";

echo "<script type='text/javascript'>
window.location.href='viewStudents.php?class_name=$class_name&class_id=$class_id';
</script>";}
else
{
//echo "Error: ".$sql."<br>".$conn->error;

}
?>
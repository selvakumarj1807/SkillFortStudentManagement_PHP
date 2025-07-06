<?php
	require('db.php');
	$id=$_REQUEST['id'];

$sql="DELETE FROM `category` WHERE id='$id'";
if($conn->query($sql)==TRUE) 
{
echo "<script>alert('Deleted Successfully!');</script>";

echo "<script type='text/javascript'>
window.location.href='course.php';
</script>";}
else
{
//echo "Error: ".$sql."<br>".$conn->error;

}
?>
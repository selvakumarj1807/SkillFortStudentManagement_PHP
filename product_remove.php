<?php
	require('db.php');
	$id=$_REQUEST['id'];
	$course=$_REQUEST['course'];



$sql="DELETE FROM `products` WHERE id='$id'";
if($conn->query($sql)==TRUE) 
{
echo "<script>alert('Deleted Successfully!');</script>";

echo "<script type='text/javascript'>
window.location.href='product.php?category=$course';
</script>";}
else
{
//echo "Error: ".$sql."<br>".$conn->error;

}
?>
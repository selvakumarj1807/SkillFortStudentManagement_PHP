<?php
require('db.php');

$id=$_POST['id'];


$category=$_POST['category'];


$sql="UPDATE `category` SET  `category`='{$category}'
WHERE `id`='$id'";

if($conn->query($sql)==TRUE)
{
echo "<script>alert('Updated Successfully!');</script>";
echo "<script type='text/javascript'>

window.location.href = 'course.php';
</script>";
}
if($conn->$connect_error)
{


echo "Error: ".$sql."<br>".$conn->error;

}

?>

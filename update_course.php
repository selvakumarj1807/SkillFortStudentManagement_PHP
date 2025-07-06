<?php
require('db.php');

$id=$_POST['id'];


$category=$_POST['category'];



//$image=$_POST['image'];



//image1


if($_FILES['image']['tmp_name']!=''){
	$sourcePath1= $_FILES['image']['tmp_name'];
$targetPath1 = "Upload/".$_FILES['image']['name'];
$filename1 = $_FILES['image']['name'];
if(move_uploaded_file($sourcePath1,$targetPath1)) {
   $image=$filename1;
  
}
 $sql="UPDATE `category` SET `category`='{$category}',`image`='{$image}'
WHERE `id`='$id'";

}
if($_FILES['image']['tmp_name']==''){
	$sourcePath1= $_FILES['image']['tmp_name'];
$targetPath1 = "Upload/".$_FILES['image']['name'];
$filename1 = $_FILES['image']['name'];
if(move_uploaded_file($sourcePath1,$targetPath1)) {
   $image=$filename1;
  
}
 $sql="UPDATE `category` SET  `category`='{$category}'
WHERE `id`='$id'";
}




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

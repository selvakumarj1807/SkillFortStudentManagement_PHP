<?php

	require ('db.php');
 $category = $_POST["category"];
 //$img  = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 

$sourcePath = $_FILES['image']['tmp_name'];
$targetPath = "Upload/".$_FILES['image']['name'];
$filename = $_FILES['image']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
   $image=$filename;
}
$res=mysqli_query($conn,"SELECT * FROM `category`");
$no=mysqli_num_rows($res)+1;
   
$sql="INSERT INTO `category`(`c_id`,`category`,`image`)
VALUES ('category_$no','$category','$image')";


if($conn->query($sql)==TRUE)
{
echo "<script>alert('Added  Successfully!');</script>";
echo "<script type='text/javascript'>
window.location.href = 'course.php';
</script>";
}
else
{
echo "Error: ".$sql."<br>".$conn->error;

}


	?>

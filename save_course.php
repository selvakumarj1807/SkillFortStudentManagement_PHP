<?php

require ('db.php');
$category = $_POST["category"];
 
$res=mysqli_query($conn,"SELECT * FROM `category`");
$no=mysqli_num_rows($res)+1;
   
$sql="INSERT INTO `category`(`c_id`,`category`)
VALUES ('category_$no','$category')";


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

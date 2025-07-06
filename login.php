<?php
require('db.php');
$firstname=$_POST['username'];
$lastname=$_POST['password'];

$sql="INSERT INTO `admin`( `username`, `password` ) VALUES
('$firstname','$lastname' )";

if($conn->query($sql)==TRUE)
  {
      echo "<script>alert('login Successfully!');</script>";
      echo "<script type='text/javascript'>
//window.location.href = 'index.php';
</script>";
  }

else
{
echo "Error: ".$sql."<br>".$conn->error;
echo "<script type='text/javascript'>
//window.location.href = 'index.php';
</script>";
}


?>

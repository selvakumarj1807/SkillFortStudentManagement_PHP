<?php

require('db.php');

$user=$_POST["user"];
$confirm_password=mysqli_real_escape_string($conn,$_POST['confirm_password']);

$sql="UPDATE `admin` SET `password`='$confirm_password' WHERE `username`= '$user'";

if($conn->query($sql)==TRUE)
{
    echo "<script> alert('User Password Updated Successfully.! '); </script>";
    echo "<script type='text/javascript'>window.location.href = 'dashboard.php';</script>";
	}

?>

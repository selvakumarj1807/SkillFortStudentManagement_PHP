<?php
require('db.php');

$id = mysqli_real_escape_string($conn, $_POST['id']);
$course = mysqli_real_escape_string($conn, $_POST['course']);
$class_time = mysqli_real_escape_string($conn, $_POST['class_time']);
$start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
$whatsappLink = mysqli_real_escape_string($conn, $_POST['whatsappLink']);
$end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
$class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$oldClassName = mysqli_real_escape_string($conn, $_POST['oldClassName']);

// First update for 'products' table
$sql1 = "UPDATE `products` SET 
    `course` = '$course',
    `class_name` = '$class_name',
    `class_time` = '$class_time',
    `whatsappLink` = '$whatsappLink',
    `start_date` = '$start_date',
    `end_date` = '$end_date',
    `description` = '$description' 
WHERE `id` = '$id'";

// Second update for 'student' table
$sql2 = "UPDATE `student` SET 
    `course` = '$course',
    `class_name` = '$class_name',
    `class_time` = '$class_time',
    `whatsappLink` = '$whatsappLink',
    `start_date` = '$start_date',
    `end_date` = '$end_date',
    `description` = '$description' 
WHERE `class_name` = '$oldClassName' AND `course` = '$course'";

// Run both queries
if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
  echo "<script>alert('Updated Successfully!');</script>";
  echo "<script>window.location.href = 'product.php?category=$course';</script>";
} else {
  echo "Error: " . mysqli_error($conn);
}
?>
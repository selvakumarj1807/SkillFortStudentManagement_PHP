<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}

$id = $_GET['id'];
$class_name = $_GET['class_name'];
$class_id = $_GET['class_id'];

$sql = "DELETE FROM tasks WHERE id='$id'";

if ($conn->query($sql)) {

    echo "<script>
            alert('Task Deleted Successfully');
            window.location.href='viewTask.php?class_name="
            . urlencode($class_name) .
            "&id=$class_id';
          </script>";
} else {
    echo "Error : " . $conn->error;
}
?>
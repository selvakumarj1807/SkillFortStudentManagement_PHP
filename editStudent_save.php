<?php

require('db.php');

$id = mysqli_real_escape_string($conn, $_POST['id']);
$studentName = mysqli_real_escape_string($conn, $_POST['studentName']);
$mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$gmail = mysqli_real_escape_string($conn, $_POST['gmail']);
$join_date = mysqli_real_escape_string($conn, $_POST['join_date']);
$referBy = mysqli_real_escape_string($conn, $_POST['referBy']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$leave_date = mysqli_real_escape_string($conn, $_POST['leave_date']);
$leave_reason = mysqli_real_escape_string($conn, $_POST['leave_reason']);

$class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
$class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
// Basic Update Query
$sql = "UPDATE `student` SET 
    `studentName` = '$studentName',
    `mobile` = '$mobile',
    `gmail` = '$gmail',
    `join_date` = '$join_date',
    `referBy` = '$referBy',
    `description` = '$description'";

// Set action based on conditions
if (!empty($leave_date) && !empty($leave_reason)) {
    $sql .= ", `leave_date` = '$leave_date',
               `deleteReason` = '$leave_reason',
               `action` = 'Inactive'";
} elseif (empty($class_id) && empty($class_name)) {
    $sql .= ", `leave_date` = '$leave_date',
               `deleteReason` = '$leave_reason',
               `action` = 'Active'";
} else {
    $sql .= ", `leave_date` = '$leave_date',
               `deleteReason` = '$leave_reason',
               `action` = 'Active'";
}

$sql .= " WHERE `id` = '$id'";

// Run the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Updated Successfully!');</script>";
    echo "<script>window.location.href = 'studentSinglePage.php?id=$id&class_id=$class_id&class_name=$class_name';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
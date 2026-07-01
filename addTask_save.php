<?php
require('db.php');

$batchId       = $_POST['batchId'];
$batch_number  = $_POST['batch_number'];
$class_name    = $_POST['class_name'];

$task_name     = $_POST['task_name'];
$google_form   = $_POST['google_form'];
$google_sheet  = $_POST['google_sheet'];


// Count tasks for this batch number
$res = mysqli_query(
            $conn,
            "SELECT * FROM tasks
             WHERE batch_number='$batch_number'"
       );

$no = mysqli_num_rows($res) + 1;


// Generate Task ID
$taskId = "Task " . str_pad($no, 2, "0", STR_PAD_LEFT);


// Insert Task
$sql = "INSERT INTO tasks
        (taskId,
         batchId,
         batch_number,
         class_name,
         task_name,
         google_form,
         google_sheet)
        VALUES
        ('$taskId',
         '$batchId',
         '$batch_number',
         '$class_name',
         '$task_name',
         '$google_form',
         '$google_sheet')";


if ($conn->query($sql) == TRUE)
{
    echo "<script>alert('Task Added Successfully!');</script>";
    echo "<script>
            window.location.href='studentDetails.php?id=$batchId';
          </script>";
}
else
{
    echo "Error : " . $conn->error;
}
?>
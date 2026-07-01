<?php
require 'db.php';

$id = $_POST['id'];
$batchId = $_POST['batchId'];

$task_name = mysqli_real_escape_string(
    $conn,
    $_POST['task_name']
);

$google_form = mysqli_real_escape_string(
    $conn,
    $_POST['google_form']
);

$google_sheet = mysqli_real_escape_string(
    $conn,
    $_POST['google_sheet']
);

$sql = "
UPDATE tasks
SET
    task_name='$task_name',
    google_form='$google_form',
    google_sheet='$google_sheet'
WHERE id='$id'
";

if ($conn->query($sql)) {

    $result = mysqli_query(
        $conn,
        "SELECT class_name
         FROM tasks
         WHERE id='$id'"
    );

    $row = mysqli_fetch_assoc($result);

    echo "<script>
            alert('Task Updated Successfully');
            window.location.href='viewTask.php?class_name="
            . urlencode($row['class_name']) .
            "&id=$batchId';
          </script>";
} else {
    echo "Error : " . $conn->error;
}
?>
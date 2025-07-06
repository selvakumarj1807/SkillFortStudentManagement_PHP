<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['class_name'])) {
    $class_name = $_POST['class_name'];

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=' . $class_name . '_Current_Students_' . date('Y-m-d') . '.csv');

    $output = fopen('php://output', 'w');

    // CSV Column Headers
    fputcsv($output, ['S.No', 'Class Name', 'Student Name', 'Mobile', 'Join Date', 'Leave Date', 'Leave Reason']);

    $query = "SELECT studentName, class_name, mobile, join_date, leave_date, deleteReason FROM student WHERE class_name = '$class_name' AND action = 'Active' ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    $slno = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $slno++;
        fputcsv($output, [
            $slno,
            $row['class_name'],
            $row['studentName'],
            $row['mobile'],
            date("d/m/Y", strtotime($row['join_date'])),
            !empty($row['leave_date']) ? date("d/m/Y", strtotime($row['leave_date'])) : '',
            !empty($row['deleteReason']) ? $row['deleteReason'] : ''
        ]);
    }

    fclose($output);
    exit();
} else {
    echo "Invalid Request!";
}
?>

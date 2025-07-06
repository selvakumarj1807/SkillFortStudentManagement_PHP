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
    header('Content-Disposition: attachment; filename=Previous_Students_' . date('Y-m-d') . '.csv');

    $output = fopen('php://output', 'w');

    // CSV Column Headers
    fputcsv($output, ['S.No', 'Student Name', 'Mobile', 'Join Date', 'Leave Date']);

    $query = "SELECT studentName, mobile, join_date, leave_date FROM student WHERE class_name = '$class_name' AND action = 'Inactive' ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    $slno = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $slno++;
        fputcsv($output, [
            $slno,
            $row['studentName'],
            $row['mobile'],
            date("d/m/Y", strtotime($row['join_date'])),
            !empty($row['leave_date']) ? date("d/m/Y", strtotime($row['leave_date'])) : ''
        ]);
    }

    fclose($output);
    exit();
} else {
    echo "Invalid Request!";
}
?>

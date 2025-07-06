<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}



if (isset($_POST['date']) && isset($_POST['status'])) {
    $date = $_POST['date'];
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);

    foreach ($_POST['status'] as $studentId => $status) {
        
        $studentName = mysqli_real_escape_string($conn, $_POST['studentName'][$studentId]);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile'][$studentId]);

        // Prevent duplicate entries for same student and date
        $checkQuery = "SELECT * FROM attendance WHERE student_id = $studentId AND date = '$date'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) == 0) {
            $insertQuery = "INSERT INTO attendance (student_id, student_name, mobile, date, status, class_name) 
                            VALUES ($studentId, '$studentName', '$mobile', '$date', '$status', '$class_name')";
            mysqli_query($conn, $insertQuery);
        }
    }

    echo "<script>alert('Attendance submitted successfully!'); window.history.back();</script>";
} else {
    echo "<script>alert('Please select date and mark attendance.'); window.history.back();</script>";
}
?>

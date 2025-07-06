<?php
include 'db.php';

$where = "";
$class_name = $_GET['class_name'];

$where = "WHERE student.class_name = '$class_name'";

if (isset($_GET['date']) && !empty($_GET['date'])) {
    $date = $_GET['date'];
    $where .= " AND attendance.date = '$date'";
    $filename = "Attendance_{$class_name}_{$date}.csv";
} elseif (isset($_GET['from']) && isset($_GET['to'])) {
    $from = $_GET['from'];
    $to = $_GET['to'];
    $where .= " AND attendance.date BETWEEN '$from' AND '$to'";
    $filename = "Attendance_{$class_name}_{$from}_to_{$to}.csv";
} else {
    $filename = "Attendance_{$class_name}.csv";
}

// Fetch attendance data with class name
$query = "SELECT attendance.date, attendance.student_name, attendance.mobile, attendance.status, student.class_name
          FROM attendance
          JOIN student ON attendance.student_id = student.id
          $where
          ORDER BY attendance.date DESC";

$result = $conn->query($query);

// Set headers for CSV download
header('Content-Type: text/csv');
header("Content-Disposition: attachment; filename=\"$filename\"");

// Open output stream
$output = fopen('php://output', 'w');

// Output header row
fputcsv($output, ['Date', 'Class Name', 'Student Name', 'Mobile', 'Status']);

// Output data rows
while ($row = $result->fetch_assoc()) {
    $formatted_date = date("d/m/Y", strtotime($row['date']));
    fputcsv($output, [$formatted_date, $row['class_name'], $row['student_name'], $row['mobile'], $row['status']]);
}

fclose($output);
exit;
?>

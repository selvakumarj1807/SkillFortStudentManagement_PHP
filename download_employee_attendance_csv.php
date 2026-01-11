<?php
require 'db.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="employee_attendance.csv"');

$output = fopen("php://output", "w");

fputcsv($output, [
    'Date',
    'Employee',
    'Role',
    'Status',
    'Reason',
    'Mobile'
]);

$where = "WHERE 1=1";

if (!empty($_GET['date'])) {
    $where .= " AND attendance_date='{$_GET['date']}'";
} elseif (!empty($_GET['from']) && !empty($_GET['to'])) {
    $where .= " AND attendance_date BETWEEN '{$_GET['from']}' AND '{$_GET['to']}'";
}

$query = "
SELECT attendance_date, employee_name, role_name,
       status, reason, mobile
FROM employee_attendance
$where
ORDER BY attendance_date DESC
";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);
exit;

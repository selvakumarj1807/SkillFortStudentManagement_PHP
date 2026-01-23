<?php
require 'db.php';

$date = $_GET['date'] ?? '';

$data = [];

if ($date) {
    $q = mysqli_query($conn,"
        SELECT employee_id,
               morning_status,
               evening_status,
               reason
        FROM employee_attendance
        WHERE attendance_date = '$date'
    ");

    while ($row = mysqli_fetch_assoc($q)) {
        $status = 'Present';

        if ($row['morning_status'] === 'Absent' && $row['evening_status'] === 'Absent') {
            $status = 'Absent';
        } elseif ($row['morning_status'] === 'Absent') {
            $status = 'Absent Morning';
        } elseif ($row['evening_status'] === 'Absent') {
            $status = 'Absent Evening';
        }

        $data[$row['employee_id']] = [
            'status' => $status,
            'reason' => $row['reason']
        ];
    }
}

echo json_encode($data);
?>
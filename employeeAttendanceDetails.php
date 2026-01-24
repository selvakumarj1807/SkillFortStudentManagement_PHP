<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}
?>

<?php include('header.php'); ?>

<style>
/* ===== PAGE LAYOUT ===== */
.content-wrapper {
    padding: 15px;
    background: #eef1f5;
}

.container-box {
    background: #ffffff;
    border-radius: 14px;
    padding: 20px;
    box-shadow: 0 8px 18px rgba(0, 0, 0, 0.08);
}

/* ===== HEADER ===== */
.page-title {
    font-size: 18px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

/* ===== FILTER FORM ===== */
.filter-form {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    align-items: center;
    background: #f8f9fa;
    padding: 15px;
    border-radius: 10px;
}

.filter-form label {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 0;
}

.filter-form input[type="date"] {
    min-width: 170px;
}

.filter-form .btn {
    min-width: 120px;
}

/* ===== TABLE ===== */
.table-responsive {
    margin-top: 15px;
    border-radius: 10px;
    overflow-x: auto;
}

.table {
    min-width: 900px;
    margin-bottom: 0;
}

.table thead th {
    background: #212529;
    color: #ffffff;
    font-size: 14px;
    white-space: nowrap;
}

.table tbody td {
    font-size: 14px;
    white-space: nowrap;
}

.table tbody tr:hover {
    background-color: #f1f5ff;
}

/* ===== WORKING DAY HIGHLIGHT ===== */
.total-working {
    font-weight: 700;
    color: #198754;
}

/* ===== BUTTONS ===== */
.back-btn {
    margin: 15px 0;
}

/* ===== MOBILE VIEW ===== */
@media (max-width: 768px) {

    .page-title {
        font-size: 16px;
        text-align: center;
    }

    .filter-form {
        flex-direction: column;
        align-items: stretch;
    }

    .filter-form label {
        align-self: flex-start;
    }

    .filter-form input,
    .filter-form .btn {
        width: 100%;
    }

    .table {
        min-width: 700px;
    }
}

/* ===== SMALL MOBILE ===== */
@media (max-width: 480px) {
    .container-box {
        padding: 15px;
    }

    .table thead th,
    .table tbody td {
        font-size: 13px;
    }
}
</style>

<div class="content-wrapper">

    <div class="back-btn">
        <a href="employee.php" class="btn btn-success">← Back</a>
    </div>

    <div class="container-box">

        <div class="page-title">Employee Attendance Summary</div>

        <!-- FILTER FORM -->
        <form method="GET" class="filter-form">

            <label>Date</label>
            <input type="date" name="date" class="form-control"
                value="<?= $_GET['date'] ?? '' ?>">

            <strong>OR</strong>

            <label>Select Date Range</label>
            <input type="date" name="from" class="form-control"
                value="<?= $_GET['from'] ?? '' ?>">

            <label>To</label>
            <input type="date" name="to" class="form-control"
                value="<?= $_GET['to'] ?? '' ?>">

            <button type="submit" class="btn btn-primary">View</button>
        </form>

        <!-- TABLE -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="bootstrapdatatable03">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Employee</th>
                        <th>Present / Total</th>
                        <th>Full Absent</th>
                        <th>Morning Absent</th>
                        <th>Evening Absent</th>
                        <th>Total Working Days</th>
                    </tr>
                </thead>
                <tbody>

<?php
$where = "WHERE 1=1";

if (!empty($_GET['date'])) {
    $date = $_GET['date'];
    $where .= " AND attendance_date = '$date'";
} elseif (!empty($_GET['from']) && !empty($_GET['to'])) {
    $from = $_GET['from'];
    $to   = $_GET['to'];
    $where .= " AND attendance_date BETWEEN '$from' AND '$to'";
}

$query = "
SELECT 
    employee_id,
    employee_name,
    COUNT(attendance_date) AS total_days,
    SUM(status = 'Present') AS present_days,
    SUM(status = 'Absent') AS full_day_absent,
    SUM(status = 'Absent Morning') AS morning_absent,
    SUM(status = 'Absent Evening') AS evening_absent
FROM employee_attendance
$where
GROUP BY employee_id, employee_name
ORDER BY employee_name ASC
";

$result = mysqli_query($conn, $query);
$sl = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $sl++;

        $present     = $row['present_days'];
        $total       = $row['total_days'];
        $fullAbsent  = $row['full_day_absent'];
        $morningAbs  = $row['morning_absent'];
        $eveningAbs  = $row['evening_absent'];

        $totalWorkingDays =
            $present
            + ($morningAbs * 0.5)
            + ($eveningAbs * 0.5);
?>
        <tr>
            <td><?= $sl ?></td>
            <td><?= htmlspecialchars($row['employee_name']) ?></td>
            <td><?= $present ?> / <?= $total ?></td>
            <td><?= $fullAbsent ?></td>
            <td><?= $morningAbs ?></td>
            <td><?= $eveningAbs ?></td>
            <td class="total-working"><?= number_format($totalWorkingDays, 1) ?></td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='7'>No data found</td></tr>";
}
?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
const dateInput = document.querySelector('input[name="date"]');
const fromInput = document.querySelector('input[name="from"]');
const toInput   = document.querySelector('input[name="to"]');

dateInput?.addEventListener('change', () => {
    if (dateInput.value) {
        fromInput.value = '';
        toInput.value = '';
    }
});

[fromInput, toInput].forEach(input => {
    input?.addEventListener('change', () => {
        if (fromInput.value || toInput.value) {
            dateInput.value = '';
        }
    });
});
</script>

<?php include('footer.php'); ?>

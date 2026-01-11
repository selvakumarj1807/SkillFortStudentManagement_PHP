<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}

$today = date('Y-m-d');
?>

<?php include('header.php'); ?>

<style>
    .container-table {
        padding: 1rem;
    }

    .classList {
        padding: 1rem;
        background-color: #f9f9f9;
        border-radius: 10px;
    }

    th,
    td {
        text-align: center;
        vertical-align: middle !important;
    }

    .status-absent {
        background-color: #dc3545 !important;
        color: #fff !important;
        font-weight: bold;
    }

    @media (max-width: 768px) {

        .btn,
        .form-control {
            width: 100%;
        }
    }
</style>

<div class="content-wrapper">
    <div class="container-table">

        <div class="d-flex justify-content-end mb-3">
            <a href="employee.php" class="btn btn-success">Back</a>
        </div>

        <div class="classList">
            <b>View Employee Attendance</b>
            <br><br>

            <form method="GET" class="d-flex flex-wrap gap-2 mb-3">

                <label>Select Date:</label>
                <input type="date" name="date" class="form-control"
                    value="<?= $_GET['date'] ?? '' ?>">

                <br><br>
                <b class="align-self-center">OR</b>

                <label>Date Range:</label>
                <input type="date" name="from" class="form-control"
                    value="<?= $_GET['from'] ?? '' ?>">
                <br>
                <input type="date" name="to" class="form-control"
                    value="<?= $_GET['to'] ?? '' ?>">

                <br><br>
                <button type="submit" class="btn btn-primary">View</button>

                <button type="submit"
                    formaction="download_employee_attendance_csv.php"
                    class="btn btn-success">
                    Download CSV
                </button>

            </form>
            <br>

            <div class="table-responsive">
                <table id="bootstrapdatatable01" class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Date</th>
                            <th>Employee</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Reason</th>
                            <th>Mobile</th>
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
SELECT employee_name, role_name, mobile,
       attendance_date, status, reason
FROM employee_attendance
$where
ORDER BY attendance_date DESC
";

                        $result = mysqli_query($conn, $query);
                        $sl = 0;

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $sl++;
                                $statusClass = ($row['status'] === 'Absent') ? 'status-absent' : '';
                        ?>
                                <tr>
                                    <td><?= $sl ?></td>
                                    <td><?= date('d/m/Y', strtotime($row['attendance_date'])) ?></td>
                                    <td><?= htmlspecialchars($row['employee_name']) ?></td>
                                    <td><?= htmlspecialchars($row['role_name']) ?></td>
                                    <td class="<?= $statusClass ?>"><?= $row['status'] ?></td>
                                    <td><?= $row['reason'] ?: '-' ?></td>
                                    <td>
                                        <a href="tel:+91<?= $row['mobile'] ?>">+91 <?= $row['mobile'] ?></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='7'>No attendance found</td></tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    const dateInput = document.querySelector('input[name="date"]');
    const fromInput = document.querySelector('input[name="from"]');
    const toInput = document.querySelector('input[name="to"]');

    dateInput.addEventListener('change', () => {
        if (dateInput.value) {
            fromInput.value = '';
            toInput.value = '';
        }
    });

    [fromInput, toInput].forEach(input => {
        input.addEventListener('change', () => {
            if (fromInput.value || toInput.value) {
                dateInput.value = '';
            }
        });
    });
</script>

<?php include('footer.php'); ?>
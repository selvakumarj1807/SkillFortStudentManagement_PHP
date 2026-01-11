<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}

$today = date('Y-m-d');
$success = '';
$error = '';

/* =====================
   SAVE / UPDATE ATTENDANCE
===================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $date = $_POST['date'];

    foreach ($_POST['status'] as $emp_id => $status) {

        $emp_id = intval($emp_id);

        $employee_name = mysqli_real_escape_string($conn, $_POST['employee_name'][$emp_id]);
        $role_name     = mysqli_real_escape_string($conn, $_POST['role_name'][$emp_id]);
        $mobile        = mysqli_real_escape_string($conn, $_POST['mobile'][$emp_id]);
        $reason        = mysqli_real_escape_string($conn, $_POST['reason'][$emp_id] ?? '');

        // Mandatory reason check
        if ($status === 'Absent' && empty($reason)) {
            $error = "Absent reason missing for employee!";
            break;
        }

        // 🔍 Check if attendance already exists
        $check = mysqli_query($conn, "
            SELECT id FROM employee_attendance 
            WHERE employee_id='$emp_id' 
            AND attendance_date='$date'
        ");

        if (mysqli_num_rows($check) > 0) {

            // ✅ UPDATE existing attendance
            mysqli_query($conn, "
                UPDATE employee_attendance SET
                    employee_name = '$employee_name',
                    role_name     = '$role_name',
                    mobile        = '$mobile',
                    status        = '$status',
                    reason        = '$reason'
                WHERE employee_id = '$emp_id'
                AND attendance_date = '$date'
            ");
        } else {

            // ✅ INSERT new attendance
            mysqli_query($conn, "
                INSERT INTO employee_attendance
                (employee_id, employee_name, role_name, mobile, attendance_date, status, reason)
                VALUES
                ('$emp_id','$employee_name','$role_name','$mobile','$date','$status','$reason')
            ");
        }
    }

    if (!$error) {
        $success = "Attendance saved / updated successfully!";
    }
}

?>

<?php include('header.php'); ?>

<style>
    .attendance-status.danger {
        background-color: #dc3545 !important;
        color: #fff;
    }

    .emp-name {
        cursor: pointer;
        color: #0d6efd;
        font-weight: 600;
    }

    .emp-details {
        display: none;
        font-size: 13px;
    }

    th,
    td {
        text-align: center;
        vertical-align: middle !important;
    }
</style>

<div class="content-wrapper">
    <div class="container-fluid">
        <br>

        <div class="d-flex justify-content-between">
            <b>Take Employee Attendance</b> <br><br>
            <a href="employee.php" class="btn btn-success btn-sm">Back</a>
        </div>
        <br>

        <?php if ($success) { ?>
            <div
                class="alert alert-success"
                id="successAlert"
                role="alert"
                onclick="closeAlert()"
                style="cursor:pointer;">
                <?= $success ?>

            </div>
        <?php } ?>

        <?php if ($error) { ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php } ?>

        <form method="POST" id="attendanceForm">

            <div style="max-width:250px">
                <label>Select Date</label>
                <input type="date" name="date" class="form-control" value="<?= $today ?>" required>
            </div>

            <br>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Employee</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sl = 0;
                        $result = mysqli_query($conn, "
    SELECT e.id, e.employee_name, e.mobile, r.role_name
    FROM employees e
    LEFT JOIN employee_roles r ON r.id = e.role_id
    ORDER BY e.id DESC
");

                        while ($row = mysqli_fetch_assoc($result)) {
                            $sl++;
                        ?>
                            <tr>
                                <td><?= $sl ?></td>

                                <td>
                                    <div class="emp-name" onclick="toggleDetails(<?= $row['id'] ?>)">
                                        <?= htmlspecialchars($row['employee_name']) ?>
                                    </div>

                                    <div class="emp-details" id="details-<?= $row['id'] ?>">
                                        Role: <?= htmlspecialchars($row['role_name']) ?><br>
                                        Mobile: <?= htmlspecialchars($row['mobile']) ?>
                                    </div>

                                    <input type="hidden" name="employee_name[<?= $row['id'] ?>]" value="<?= $row['employee_name'] ?>">
                                    <input type="hidden" name="role_name[<?= $row['id'] ?>]" value="<?= $row['role_name'] ?>">
                                    <input type="hidden" name="mobile[<?= $row['id'] ?>]" value="<?= $row['mobile'] ?>">
                                    <input type="hidden" name="reason[<?= $row['id'] ?>]" id="reason-<?= $row['id'] ?>">
                                </td>

                                <td>
                                    <select name="status[<?= $row['id'] ?>]"
                                        class="form-control attendance-status"
                                        data-emp="<?= $row['id'] ?>">
                                        <option value="Present">Present</option>
                                        <option value="Absent">Absent</option>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

            <button class="btn btn-success">Submit Attendance</button>
        </form>
    </div>
</div>

<!-- =====================
     ABSENT REASON MODAL
===================== -->
<div class="modal fade" id="reasonModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Absent Reason</h4>
            </div>

            <div class="modal-body">
                <textarea id="reasonText" class="form-control" rows="4"
                    placeholder="Enter reason for absence"></textarea>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="saveReason">Save Reason</button>
            </div>

        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<script>
    let currentEmp = null;

    function toggleDetails(id) {
        const el = document.getElementById('details-' + id);
        el.style.display = el.style.display === 'block' ? 'none' : 'block';
    }

    document.querySelectorAll('.attendance-status').forEach(sel => {
        sel.addEventListener('change', function() {

            currentEmp = this.dataset.emp;

            if (this.value === 'Absent') {
                $('#reasonModal').modal('show');
                document.getElementById('reasonText').value = '';
                this.classList.add('danger');
            } else {
                document.getElementById('reason-' + currentEmp).value = '';
                this.classList.remove('danger');
            }
        });
    });

    document.getElementById('saveReason').addEventListener('click', function() {

        const reason = document.getElementById('reasonText').value.trim();

        if (reason === '') {
            alert('Reason is required!');
            return;
        }

        document.getElementById('reason-' + currentEmp).value = reason;
        $('#reasonModal').modal('hide');
    });
</script>

<script>
    function closeAlert(e) {
        if (e) e.stopPropagation();
        const alertBox = document.getElementById('successAlert');
        if (alertBox) {
            alertBox.classList.remove('show');
            setTimeout(() => alertBox.remove(), 300);
        }
    }

    // Auto close after 5 seconds (optional)
    setTimeout(() => {
        closeAlert();
    }, 5000);
</script>
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
    <div class="container-fluid"><br>

        <div class="d-flex justify-content-between">
            <b>Take Employee Attendance</b>
            <a href="employee.php" class="btn btn-success btn-sm">Back</a>
        </div><br>

        <div id="alertBox"></div>

        <form id="attendanceForm">
            <div style="max-width:250px">
                <label>Select Date</label>
                <input type="date" name="date" id="attendanceDate" class="form-control" value="<?= $today ?>" required>
            </div><br>

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
    SELECT e.id,e.employee_name,e.mobile,r.role_name
    FROM employees e
    LEFT JOIN employee_roles r ON r.id=e.role_id
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

                                <td style="display: flex; justify-content: center; align-items: center;">
                                    <select name="status[<?= $row['id'] ?>]"
                                        class="form-control attendance-status"
                                        data-emp="<?= $row['id'] ?>"
                                        style="width:150px">
                                        <option value="Present">Present</option>
                                        <option value="Absent">Absent (Full)</option>
                                        <option value="Absent Morning">Absent Morning</option>
                                        <option value="Absent Evening">Absent Evening</option>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-success">Submit Attendance</button>
        </form>
    </div>
</div>

<!-- Reason Modal -->
<div class="modal fade" id="reasonModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Absent Reason</h4>
            </div>
            <div class="modal-body">
                <textarea id="reasonText" class="form-control" rows="4"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="saveReason">Save</button>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<script>
    let activeEmp = null;

    /* Attendance Change */
    document.querySelectorAll('.attendance-status').forEach(select => {
        select.addEventListener('change', function() {
            const empId = this.dataset.emp;
            const val = this.value;

            if (val.includes('Absent')) {
                activeEmp = empId;
                document.getElementById('reasonText').value =
                    document.getElementById('reason-' + empId).value;
                $('#reasonModal').modal('show');
                this.classList.add('danger');
            } else {
                // ✅ FIX: clear only THIS employee reason
                document.getElementById('reason-' + empId).value = '';
                this.classList.remove('danger');
            }
        });
    });

    /* Save Reason */
    document.getElementById('saveReason').onclick = function() {
        const reason = document.getElementById('reasonText').value.trim();
        if (reason === '') {
            alert('Reason required');
            return;
        }
        document.getElementById('reason-' + activeEmp).value = reason;
        $('#reasonModal').modal('hide');
    };

    /* AJAX SUBMIT */

    document.getElementById('attendanceForm').addEventListener('submit', function(e) {
        e.preventDefault();

        fetch('employeeAttendance_save.php', {
                method: 'POST',
                body: new FormData(this)
            })
            .then(res => res.json())
            .then(data => {

                const alertBox = document.getElementById('alertBox');

                alertBox.innerHTML = `
            <div class="alert alert-${data.status}" id="autoAlert">
                ${data.message}
            </div>
        `;

                /* ✅ AUTO REMOVE AFTER 5 SECONDS */
                setTimeout(() => {
                    const alert = document.getElementById('autoAlert');
                    if (alert) {
                        alert.classList.remove('show');
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 300);
                    }
                }, 5000);
            })
            .catch(() => {
                alert('Server error. Try again.');
            });
    });



    function toggleDetails(id) {
        const el = document.getElementById('details-' + id);
        el.style.display = el.style.display === 'block' ? 'none' : 'block';
    }
</script>

<script>
    function loadAttendanceByDate(date) {

        fetch('getAttendanceByDate.php?date=' + date)
            .then(res => res.json())
            .then(data => {

                document.querySelectorAll('.attendance-status').forEach(select => {

                    const empId = select.dataset.emp;
                    const reasonInput = document.getElementById('reason-' + empId);

                    if (data[empId]) {

                        select.value = data[empId].status;
                        reasonInput.value = data[empId].reason ?? '';

                        if (data[empId].status.includes('Absent')) {
                            select.classList.add('danger');
                        } else {
                            select.classList.remove('danger');
                        }

                    } else {
                        select.value = 'Present';
                        reasonInput.value = '';
                        select.classList.remove('danger');
                    }
                });
            });
    }

    /* Load attendance when date changes */
    document.getElementById('attendanceDate').addEventListener('change', function() {
        loadAttendanceByDate(this.value);
    });

    /* ✅ AUTO LOAD TODAY ON PAGE LOAD */
    document.addEventListener('DOMContentLoaded', function() {
        const today = document.getElementById('attendanceDate').value;
        loadAttendanceByDate(today);
    });
</script>
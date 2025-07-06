<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}

$username = $_SESSION["username"];
$company_name = "Skill Fort";
$today = date('Y-m-d');

$class_name = $_GET["class_name"] ?? '';
$id = $_GET['id'] ?? ($_GET['class_id'] ?? '');
?>

<?php include('header.php') ?>

<style>
    .container-table {
        padding: 1rem;
    }

    .classList {
        padding: 1rem;
        background-color: #f9f9f9;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .classList {
            padding: 0.5rem;
        }

        .table-responsive {
            font-size: 14px;
        }

        .table thead {
            font-size: 14px;
        }

        .form-control {
            width: 100%;
        }

        .d-flex.flex-wrap.gap-2.mb-3 {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }

    @media (min-width: 769px) {
        .form-control {
            min-width: 200px;
        }

        .btn {
            min-width: 150px;
        }
    }

    th,
    td {
        vertical-align: middle !important;
        text-align: center;
    }
</style>

<div class="content-wrapper">
    <div class="container-table">
        <div class="d-flex flex-wrap justify-content-end gap-2 mb-3">
            <a href="studentDetails.php?id=<?php echo $id; ?>">
                <button class="btn btn-success">Back</button>
            </a>
        </div>

        <div class="classList">
            <b>View Attendance <span style="color: #007bff;"><?php echo htmlspecialchars($class_name); ?></span></b>
            <br><br>

            <form method="GET" class="d-flex flex-wrap gap-2 mb-3">
                <label for="date" class="form-label">Select Date:</label>
                <input type="hidden" name="class_name" value="<?php echo $class_name; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <input type="date" name="date" class="form-control" value="<?php echo $_GET['date'] ?? ''; ?>" placeholder="Single Date">

                <h5 style="text-align: center;"><b class="align-self-center">OR</b></h5>

                <label for="from" class="form-label">Select Date Range:</label>

                <input type="date" name="from" class="form-control" value="<?php echo $_GET['from'] ?? ''; ?>" placeholder="From Date">
                <br>
                <input type="date" name="to" class="form-control" value="<?php echo $_GET['to'] ?? ''; ?>" placeholder="To Date">

                <br><br>

                <button type="submit" name="action" value="view" class="btn btn-primary w-100 w-md-auto">View Attendance</button>

                <button type="submit" name="action" value="download" formaction="download_attendance_csv.php?class_name=<?php echo $class_name; ?>" class="btn btn-success w-100 w-md-auto">Download CSV</button>

            </form>

            <br><br>

            <!-- Attendance Table -->
            <div class="table-responsive">
                <table id="bootstrapdatatable01" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Date</th>
                            <th>Student Name</th>
                            <th>Mobile</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $where = "WHERE student.class_name = '$class_name'";

                        if (!empty($_GET['date'])) {
                            $date = $_GET['date'];
                            $where .= " AND attendance.date = '$date'";
                        } elseif (!empty($_GET['from']) && !empty($_GET['to'])) {
                            $from = $_GET['from'];
                            $to = $_GET['to'];
                            $where .= " AND attendance.date BETWEEN '$from' AND '$to'";
                        }

                        $query = "SELECT attendance.date, attendance.student_name, attendance.mobile, attendance.status
                      FROM attendance
                      JOIN student ON attendance.student_id = student.id
                      $where
                      ORDER BY attendance.date DESC";

                        $result = mysqli_query($conn, $query);
                        $slno = 0;

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $slno++;
                                echo "<tr>
                            <td>{$slno}</td>
                            <td>" . date("d/m/Y", strtotime($row['date'])) . "</td>
                            <td>{$row['student_name']}</td>
                            <td><a href='tel:{$row['mobile']}'>{$row['mobile']}</a></td>
                            <td>{$row['status']}</td>
                          </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No attendance found.</td></tr>";
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

    fromInput.addEventListener('change', () => {
        if (fromInput.value || toInput.value) {
            dateInput.value = '';
        }
    });

    toInput.addEventListener('change', () => {
        if (fromInput.value || toInput.value) {
            dateInput.value = '';
        }
    });
</script>


<?php include('footer.php') ?>
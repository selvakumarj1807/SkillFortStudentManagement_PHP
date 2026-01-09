<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}

$username = $_SESSION["username"];
$company_name = "Ecom";

/* =========================
   FETCH ROLES
========================= */
$roles = [];
$roleQuery = mysqli_query($conn, "SELECT id, role_name FROM employee_roles ORDER BY role_name ASC");
while ($row = mysqli_fetch_assoc($roleQuery)) {
    $roles[] = $row;
}

/* =========================
   EDIT MODE
========================= */
$edit_id = '';
$employeeName = '';
$mobile = '';
$role_id = '';
$join_date = '';

if (isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $empQuery = mysqli_query($conn, "SELECT * FROM employees WHERE id=$edit_id");
    if ($emp = mysqli_fetch_assoc($empQuery)) {
        $employeeName = $emp['employee_name'];
        $mobile = $emp['mobile'];
        $role_id = $emp['role_id'];
        $join_date = $emp['join_date'];
    }
}

/* =========================
   INSERT / UPDATE
========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $employeeName = mysqli_real_escape_string($conn, $_POST['employeeName']);
    $mobile       = mysqli_real_escape_string($conn, $_POST['mobile']);
    $role_id      = intval($_POST['role_id']);
    $join_date    = $_POST['join_date'];

    if (!empty($_POST['edit_id'])) {
        // UPDATE
        $edit_id = intval($_POST['edit_id']);
        $sql = "UPDATE employees SET 
                    employee_name='$employeeName',
                    mobile='$mobile',
                    role_id='$role_id',
                    join_date='$join_date'
                WHERE id=$edit_id";
    } else {
        // INSERT
        $sql = "INSERT INTO employees (employee_name, mobile, role_id, join_date)
                VALUES ('$employeeName', '$mobile', '$role_id', '$join_date')";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: employee.php?success=1");
        exit();
    } else {
        $error = "Database Error!";
    }
}
?>

<?php include('header.php') ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="content-wrapper">
    <section class="content-header container mt-3">
        <h1 class="display-4"><?= $edit_id ? 'Edit Employee' : 'Add Employee' ?></h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="box box-warning">
                    <div class="box-body">

                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endif; ?>

                        <form method="POST">

                            <input type="hidden" name="edit_id" value="<?= $edit_id ?>">

                            <div class="form-group">
                                <label>Employee Name</label>
                                <input type="text" class="form-control" name="employeeName"
                                    value="<?= htmlspecialchars($employeeName) ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" class="form-control" name="mobile"
                                    value="<?= htmlspecialchars($mobile) ?>" pattern="[0-9]{10}" required>
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-user-tie"></i> Role</label>
                                <select class="form-control" name="role_id" required>
                                    <option value="">-- Select Role --</option>
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?= $role['id'] ?>"
                                            <?= ($role_id == $role['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($role['role_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Join Date</label>
                                <input type="text" class="form-control" id="join_date"
                                    name="join_date" value="<?= $join_date ?>" required>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> <?= $edit_id ? 'Update' : 'Submit' ?>
                            </button>

                            <a href="employee.php" class="btn btn-secondary">Back</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#join_date", {
        dateFormat: "Y-m-d",
        defaultDate: "<?= $join_date ?: date('Y-m-d') ?>"
    });
</script>
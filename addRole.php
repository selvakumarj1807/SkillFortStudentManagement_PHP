<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}

$error = "";

/* =========================
   INSERT / UPDATE
========================= */
if (isset($_POST['save_role'])) {

    $roleName = trim(mysqli_real_escape_string($conn, $_POST['roleName']));
    $roleId   = $_POST['role_id'];

    // CHECK DUPLICATE ROLE (CASE INSENSITIVE)
    if ($roleId == "") {
        $check = mysqli_query(
            $conn,
            "SELECT id FROM employee_roles WHERE LOWER(role_name)=LOWER('$roleName')"
        );
    } else {
        $check = mysqli_query(
            $conn,
            "SELECT id FROM employee_roles 
             WHERE LOWER(role_name)=LOWER('$roleName') 
             AND id != '$roleId'"
        );
    }

    if (mysqli_num_rows($check) > 0) {
        $error = "Role name already exists!";
    } else {
        if ($roleId == "") {
            mysqli_query($conn, "INSERT INTO employee_roles (role_name) VALUES ('$roleName')");
            header("Location: addRole.php?success=1");
        } else {
            mysqli_query($conn, "UPDATE employee_roles SET role_name='$roleName' WHERE id='$roleId'");
            header("Location: addRole.php?updated=1");
        }
        exit();
    }
}

/* =========================
   DELETE
========================= */
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM employee_roles WHERE id='$id'");
    header("Location: addRole.php?deleted=1");
    exit();
}

/* =========================
   EDIT FETCH
========================= */
$edit_id = "";
$edit_role = "";

if (isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $res = mysqli_query($conn, "SELECT * FROM employee_roles WHERE id='$edit_id'");
    if ($row = mysqli_fetch_assoc($res)) {
        $edit_role = $row['role_name'];
    }
}
?>

<?php include('header.php'); ?>

<style>
    @media (max-width: 768px) {
        .content-wrapper {
            padding: 15px;
        }
    }
</style>

<div class="content-wrapper">

    <!-- HEADER -->
    <section class="content-header" style="margin-top:15px;">
        <h1>Add / Edit Employee Role</h1>
    </section>

    <!-- FORM -->
    <section class="content" style="margin-top:15px;">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="box box-warning">
                <div class="box-body">

                    <?php if ($error): ?>
                        <div class="alert alert-danger">
                            <i class="fa fa-exclamation-circle"></i> <?= $error ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">

                        <input type="hidden" name="role_id" value="<?= $edit_id ?>">

                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text"
                                name="roleName"
                                class="form-control"
                                placeholder="Enter Role Name"
                                value="<?= htmlspecialchars($edit_role) ?>"
                                required>
                        </div>

                        <div style="margin-top:30px;">
                            <button type="submit" name="save_role" class="btn btn-primary">
                                <?= $edit_id ? 'Update' : 'Submit' ?>
                            </button>

                            <a href="addRole.php" class="btn btn-secondary">Clear</a>
                            <a href="employee.php" class="btn btn-secondary">Back</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- TABLE -->
    <section class="content mt-4">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>S.No</th>
                    <th>Role Name</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                $result = mysqli_query($conn, "SELECT * FROM employee_roles ORDER BY id DESC");
                while ($row = mysqli_fetch_assoc($result)) {
                    $i++;
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= htmlspecialchars($row['role_name']) ?></td>
                        <td class="text-center">
                            <a href="addRole.php?edit=<?= $row['id'] ?>" class="btn btn-sm btn-success">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="addRole.php?delete=<?= $row['id'] ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this role?');">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

</div>

<?php include('footer.php'); ?>
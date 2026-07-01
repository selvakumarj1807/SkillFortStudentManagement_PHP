<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM tasks WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Task not found.");
}
?>

<?php include('header.php'); ?>

<div class="content-wrapper">
    <section class="content-header container mt-3">
        <h2>Edit Task</h2>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">

                <div class="box box-warning">
                    <div class="box-body">

                        <form action="editTaskSave.php" method="POST">

                            <input type="hidden"
                                name="id"
                                value="<?php echo $row['id']; ?>">

                            <input type="hidden"
                                name="batchId"
                                value="<?php echo $row['batchId']; ?>">

                            <div class="form-group">
                                <label>Task Name</label>
                                <input type="text"
                                    name="task_name"
                                    class="form-control"
                                    value="<?php echo $row['task_name']; ?>"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Google Form</label>
                                <input type="text"
                                    name="google_form"
                                    class="form-control"
                                    value="<?php echo $row['google_form']; ?>"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Google Spreadsheet</label>
                                <input type="text"
                                    name="google_sheet"
                                    class="form-control"
                                    value="<?php echo $row['google_sheet']; ?>">
                            </div>

                            <br>

                            <button type="submit"
                                class="btn btn-primary">
                                Update Task
                            </button>

                            <a href="viewTask.php?class_name=<?php echo urlencode($row['class_name']); ?>&id=<?php echo $row['batchId']; ?>"
                                class="btn btn-secondary">
                                Back
                            </a>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<?php include('footer.php'); ?>
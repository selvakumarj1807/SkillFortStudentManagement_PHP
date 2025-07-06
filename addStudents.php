<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Ecom";

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}
?>
<?php include('header.php') ?>

<!-- Flatpickr CSS for Date & Time Picker -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>
    @media (max-width: 768px) {
        .content-wrapper {
            padding: 15px;
        }
    }
</style>

<?php $id = $_GET['id']; ?>
<?php
$slno = 0;
$result = mysqli_query($conn, "SELECT * FROM `products` WHERE id='$id'");

while ($row_result = mysqli_fetch_array($result)) {
    $slno++;
    $item_id = $row_result['id'];
    $course = $row_result['course'];
    $batch_number = $row_result['batch_number'];
    $class_name = $row_result['class_name'];
    $class_time = $row_result['class_time'];
    $start_date = $row_result['start_date'];
    $whatsappLink = $row_result['whatsappLink'];
    $end_date = $row_result['end_date'];
    $description = $row_result['description'];
?>

    <div class="content-wrapper">
        <section class="content-header container mt-3">
            <div class="row">
                <div class="col-12" style="padding: 20px;">
                    <h1 class="display-4 text-md-left">Add Students</h1>
                    <h4 class="text-md-left">
                        <?php echo $class_name; ?> - <?php echo $class_time; ?> - <?php echo date("d/F/Y", strtotime($start_date));; ?>
                    </h4>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12" style="padding-left: 30px">
                    <div class="box box-warning">
                        <div class="box-body">
                            <form role="form" action="addStudent_save.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="course" value="<?php echo $course; ?>" />
                                <input type="hidden" name="class_name" value="<?php echo $class_name; ?>" />
                                <input type="hidden" name="class_time" value="<?php echo $class_time; ?>" />
                                <input type="hidden" name="start_date" value="<?php echo $start_date; ?>" />
                                <input type="hidden" name="whatsappLink" value="<?php echo $whatsappLink; ?>" />
                                <input type="hidden" name="end_date" value="<?php echo $end_date; ?>" />
                                <input type="hidden" name="batchId" value="<?php echo $id; ?>" />

                                <div class="form-group">
                                    <label for="studentName">Student Name</label>
                                    <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Enter Student Name" required>
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile Number" required>
                                </div>

                                <div class="form-group">
                                    <label for="gmail">Gmail</label>
                                    <input type="text" class="form-control" id="gmail" name="gmail" placeholder="Enter Gmail" required>
                                </div>

                                <div class="form-group">
                                    <label for="start_date">Join Date</label>
                                    <input type="text" class="form-control" id="join_date" name="join_date" placeholder="Select Join Date" required>
                                </div>

                                <div class="form-group">
                                    <label for="referBy">Refer By</label>
                                    <input type="text" class="form-control" id="referBy" name="referBy" placeholder="Enter Refer By" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Student Description"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="studentDetails.php?id=<?php echo $id; ?>" class="btn btn-secondary">Back</a>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
}
?>
<?php include('footer.php') ?>

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(document).ready(function() {
        // Date Picker
        $("#join_date").flatpickr({
            dateFormat: "Y-m-d",
            defaultDate: new Date()
        });

        // Time Picker with 12-hour format and AM/PM
        $("#class_time").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "h:i K",
            time_24hr: false
        });
    });
</script>
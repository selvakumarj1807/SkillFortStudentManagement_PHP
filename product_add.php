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

<?php $category = $_GET['category']; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>ADD <?php echo $category; ?> Class</h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="box box-warning">
                    <div class="box-body">



                        <form role="form" action="product_save.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="course">Course</label>
                                <input type="text" class="form-control" id="course" name="course" value="<?php echo $category; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="whatsappLink">Whatsapp Group Link</label>
                                <input type="text" class="form-control" id="whatsappLink" name="whatsappLink" placeholder="Enter Whatsapp Group Link" required>
                            </div>

                            <div class="form-group">
                                <label for="class_time">Class Time</label>
                                <input type="text" class="form-control" id="class_time" name="class_time" placeholder="Select Class Time" required>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Select Start Date" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="product.php?category=<?php echo $category; ?>" class="btn btn-secondary">Back</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('footer.php') ?>

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    $(document).ready(function() {
        // Date Picker
        $("#start_date").flatpickr({
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
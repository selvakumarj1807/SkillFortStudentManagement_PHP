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
    <section class="content-header">
      <h1>Edit <?php echo $class_name; ?> Class</h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
          <div class="box box-warning">
            <div class="box-body">


              <form role="form" action="product_update.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $item_id; ?>">
                <input type="hidden" name="oldClassName" value="<?php echo $class_name; ?>">

                <div class="form-group">
                  <label for="course">Course</label>
                  <input type="text" class="form-control" id="course" name="course" value="<?php echo $course; ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="course">Class Name</label>
                  <input type="text" class="form-control" id="class_name" name="class_name" value="<?php echo $class_name; ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="whatsappLink">Whatsapp Group Link</label>
                  <input type="text" class="form-control" id="whatsappLink" name="whatsappLink" value="<?php echo $whatsappLink; ?>" placeholder="Enter Whatsapp Group Link" required>
                </div>

                <div class="form-group">
                  <label for="class_time">Class Time</label>
                  <input type="text" class="form-control" id="class_time" name="class_time" value="<?php echo $class_time; ?>" placeholder="Select Class Time" required>
                </div>

                <div class="form-group">
                  <label for="start_date">Start Date</label>
                  <input type="text" class="form-control" id="start_date" name="start_date" value="<?php echo $start_date; ?>" placeholder="Select Start Date" required>
                </div>

                <div class="form-group">
                  <label for="end_date">End Date</label>
                  <input type="text" class="form-control" id="end_date" name="end_date" value="<?php echo $end_date; ?>" placeholder="Select End Date">
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Class Description"><?php echo $description; ?></textarea>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="product.php?category=<?php echo $course; ?>" class="btn btn-secondary">Back</a>

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
    $("#start_date").flatpickr({
      dateFormat: "Y-m-d",
      defaultDate: new Date()
    });

    $("#end_date").flatpickr({
      dateFormat: "Y-m-d",
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
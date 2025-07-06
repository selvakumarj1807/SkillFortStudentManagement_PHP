<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Skill Fort";

if (!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
{
    header("Location:index.php");
    exit();
}

?>


<?php include('header.php') ?>
<div class="content-wrapper">

    <?php
    $slno = 0;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM `products` WHERE id='$id'";
    }
    if (isset($_GET['course'])) {
        $course = $_GET['course'];
        $query = "SELECT * FROM `products` WHERE course='$course' LIMIT 1";
    }

    if ($query != "") {
        $result = mysqli_query($conn, $query);

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

            <div class="studentDetailsContainer">
                <h2 style="text-align:center;">Student Details - <?php echo $class_name; ?></h2>
                <br>
                <div class="tile-container">
                    <a href="addStudents.php?id=<?php echo $item_id; ?>">
                        <div class="tile"> Add Students </div>
                    </a>
                    <a href="viewStudents.php?class_name=<?php echo urlencode($class_name); ?>&id=<?php echo $item_id; ?>">
                        <div class="tile"> View Students </div>
                    </a>
                    <a href="takeAttendance.php?class_name=<?php echo urlencode($class_name); ?>&id=<?php echo $item_id; ?>">
                        <div class="tile"> Take Attendance</div>
                    </a>
                    <a href="viewAttendance.php?class_name=<?php echo urlencode($class_name); ?>&id=<?php echo $item_id; ?>">
                        <div class="tile"> View Attendance</div>
                    </a>
                </div>
            </div>

    <?php
        }
    } else {
        echo "<p style='text-align:center;'>Invalid Request. Please provide valid ID or Course.</p>";
    }
    ?>
</div>
<?php include('footer.php') ?>
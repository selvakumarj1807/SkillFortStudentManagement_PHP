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
<?php
$today = date('Y-m-d');
?>
<?php
$class_name = $_GET["class_name"];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_GET['class_id'])) {
    $id = $_GET['class_id'];
}
?>
<div class="content-wrapper">
    <div class="container-table">
        <br>

        <div class="d-flex flex-wrap justify-content-end mb-3 gap-2">
            <a href="studentDetails.php?id=<?php echo $id; ?>"><button class="btn btn-success me-2 mb-2">Back</button></a>

        </div>
        <?php
        $slno = 0;
        $result = mysqli_query($conn, "SELECT * FROM `student` WHERE `class_name`='$class_name' and `action`='Active' ORDER BY `id` DESC");

        while ($row_result = mysqli_fetch_array($result)) {
            $slno++;
            $item_id = $row_result['id'];
            $course = $row_result['course'];
            $class_name = $row_result['class_name'];
            $class_time = $row_result['class_time'];
            $start_date = $row_result['start_date'];
            $whatsappLink = $row_result['whatsappLink'];

            $description = $row_result['description'];
            $gmail = $row_result['gmail'];
            $referBy = $row_result['referBy'];
            $join_date = $row_result['join_date'];
            $mobile = $row_result['mobile'];
            $studentId = $row_result['studentId'];
            $studentName = $row_result['studentName'];

            $leave_date = $row_result['leave_date'];
        }
        ?>

        <div class="classList" style="margin: 3px;">
            <div class="container-ClassList">

                <br>
                <b>
                    Take Attendance <span style="color: #007bff;"><?php echo $class_name; ?></span>
                </b>
                <br><br>
                <form method="POST" action="submitAttendance.php">
                    <div class="mb-3" style="width: 300px;margin-bottom: 20px;">
                        <label for="date" class="form-label">Select Date:</label>
                        <input type="date" name="date" id="date" class="form-control" value="<?php echo $today; ?>" required>
                        <input type="hidden" name="class_name" value="<?php echo $class_name; ?>">
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $slno = 0;
                                $result = mysqli_query($conn, "SELECT * FROM `student` WHERE `class_name`='$class_name' AND `action`='Active' ORDER BY `id` DESC");

                                while ($row_result = mysqli_fetch_array($result)) {
                                    $slno++;
                                    $studentId = $row_result['id'];
                                    $studentName = $row_result['studentName'];
                                    $mobile = $row_result['mobile'];
                                ?>
                                    <tr>
                                        <td><?php echo $slno; ?></td>
                                        <td><?php echo $studentName; ?></td>
                                        <td>
                                            <input type="hidden" name="studentName[<?php echo $studentId; ?>]" value="<?php echo $studentName; ?>">
                                            <input type="hidden" name="mobile[<?php echo $studentId; ?>]" value="<?php echo $mobile; ?>">
                                            <a href="tel:<?php echo $mobile; ?>"><?php echo $mobile; ?></a>
                                        </td>
                                        <td>
                                            <select name="status[<?php echo $studentId; ?>]" class="form-select">
                                                <option value="Present" selected>Present</option>
                                                <option value="Absent">Absent</option>
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


        <!-- ./col -->
    </div><!-- /.row -->
</div><!-- /.row -->



<script>
    const mobileNumber = "<?php echo $mobile; ?>";
    const link = document.getElementById("callLink");

    function isMobileDevice() {
        return /Mobi|Android|iPhone|iPad/i.test(navigator.userAgent);
    }

    if (isMobileDevice()) {
        // On mobile, open dial pad
        link.href = "tel:" + mobileNumber;
    } else {
        // On laptop/desktop, open WhatsApp
        link.href = "https://wa.me/" + 91 + mobileNumber.replace(/[^0-9]/g, '');
        link.target = "_blank";
    }
</script>


<?php include('footer.php') ?>
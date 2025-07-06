<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Skill Fort";

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit();
}
?>
<?php include('header.php') ?>
<?php
//$id = $_GET['id'];
//$class_name = $_GET['class_name'];

?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
} 
if (isset($_GET['class_name'])) {
    $class_name = $_GET['class_name'];
} 

if (isset($_GET['class_id'])) {
    $class_id = $_GET['class_id'];
} 
?>


<style>
    .studentDetailsContainer {
        padding: 20px;
    }

    .tile {
        background: rgb(12, 101, 185);
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        word-break: break-word;
    }
</style>

<div class="content-wrapper">
    <div class="container-fluid mt-3">
        <br>
        <div class="d-flex flex-wrap justify-content-end mb-3 gap-2">
            <a href="viewStudents.php?class_name=<?php echo $class_name; ?>&class_id=<?php echo $class_id; ?>"><button class="btn btn-success me-2 mb-2">Back</button></a>

            <a href="studentEdit.php?id=<?php echo $id; ?>&class_id=<?php echo $class_id; ?>&class_name=<?php echo $class_name; ?>"><button class="btn btn-primary me-2 mb-2">Edit</button></a>
        </div>



        <div class="studentDetailsContainer">
            <?php
            $slno = 0;
            $result = mysqli_query($conn, "SELECT * FROM `student` WHERE `id`='$id'");

            while ($row_result = mysqli_fetch_array($result)) {
                $slno++;
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
                $deleteReason = $row_result['deleteReason'];

                $end_date = $row_result['end_date'];
            ?>

                <h2 class="text-center mb-4">Student Details - <?php echo $studentName; ?></h2>

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Course:</span> <?php echo $course; ?> </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Course Start Date:</span> <?php echo $start_date; ?> </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Course End Date:</span> <?php echo $end_date ? $end_date : 'N/A'; ?> </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Class Name:</span> <?php echo $class_name; ?> </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Class Time:</span> <?php echo $class_time; ?> </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Student Join Date:</span> <?php echo $join_date; ?> </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Leave Date:</span> <?php echo $leave_date ? $leave_date : 'N/A'; ?> </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Leave Reason:</span> <?php echo $deleteReason ? $deleteReason : 'N/A'; ?> </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Student ID:</span> <?php echo $studentId; ?> </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Student Name:</span> <?php echo $studentName; ?> </div>
                    </div>


                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Gmail:</span> <?php echo $gmail; ?> </div>
                    </div>


                    <div class="col-md-6 col-12">
                        <div class="tile">
                            <span style="color: rgb(192, 192, 192);">Student Mobile:</span>
                            <a id="callLink" href="#" style="margin-left: 5px;"><span style="color: white;"><?php echo $mobile; ?></span></a>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Refer By:</span> <?php echo $referBy; ?> </div>
                    </div>


                    <div class="col-md-6 col-12">
                        <div class="tile"> <span style="color: rgb(192, 192, 192);">Student Description:</span> <?php echo $description; ?> </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="tile">
                            <span style="color: rgb(192, 192, 192);">Class WhatsApp Link:</span>
                            <a href="<?php echo $whatsappLink; ?>" target="_blank" class="btn btn-outline-primary btn-sm ml-2"><span style="color: whitesmoke;">Visit Group</span></a>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    const mobileNumber = "<?php echo $mobile; ?>";
    const link = document.getElementById("callLink");

    function isMobileDevice() {
        return /Mobi|Android|iPhone|iPad/i.test(navigator.userAgent);
    }

    if (isMobileDevice()) {
        // On mobile, open dial pad
        link.href = "tel:" + mobileNumber.replace(/[^0-9]/g, '');
    } else {
        // On laptop/desktop, open WhatsApp
        link.href = "https://wa.me/91" + mobileNumber.replace(/[^0-9]/g, '');
        link.target = "_blank";
    }
</script>


<?php include('footer.php') ?>
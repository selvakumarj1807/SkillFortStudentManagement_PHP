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
$course = $_GET["category"];

?>
<div class="content-wrapper">
    <div class="container-table">
        <br>

        <div class="classList">
            <div class="container-ClassList">

                <b>
                    <h2 id="h1id01">Total <?php echo $course; ?> Students</h2>
                </b>

                <div class="summary">
                    <div class="summary-card">
                        <h2 id="enquiryCount">0</h2>
                    </div>
                </div>

                <div class="filters">
                    <input type="text" id="searchInput" placeholder="Search Batch Number, Date or Time" />
                    <button id="resetBtn">Reset Filters</button>
                </div>
                <div id="enquiryList" class="card-grid">
                    <?php
                    $slno = 0;
                    $result = mysqli_query($conn, "SELECT * FROM `student` WHERE `course`='$course' ORDER BY `id` DESC");

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

                    ?>

                        <div class="card">
                            <h3 class="enquiry-id"><?php echo $studentName; ?></h3>
                            <h4 style="display: none;"><?php echo $studentId; ?></h4>
                            <div class="course-badge">

                                <span class="badge badge-secondary" style="padding: 10px;"><?php echo $class_name; ?></span>

                            </div>
                            <div class="mobile-badge">
                                <a class="callLink" href="#"><?php echo $mobile; ?></a>
                            </div>

                            <div class="card-footer">
                                <div><strong>Join Date:</strong><br><?php echo date("d/m/Y", strtotime($join_date)); ?></div>
                                <div>
                                    <strong>Leave Date:</strong><br>
                                    <?php
                                    if (!empty($leave_date)) {
                                        echo date("d/m/Y", strtotime($leave_date));
                                    } else {
                                        echo "";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                    <!-- You can add more cards similarly -->

                </div>

                <div class="pagination" id="pagination"></div>
            </div>
        </div>


        <!-- ./col -->
    </div><!-- /.row -->
</div><!-- /.row -->


<script>
    function isMobileDevice() {
        return /Mobi|Android|iPhone|iPad/i.test(navigator.userAgent);
    }

    const callLinks = document.querySelectorAll(".callLink");

    callLinks.forEach(link => {
        const number = link.textContent.trim().replace(/[^0-9]/g, '');
        if (isMobileDevice()) {
            link.href = "tel:" + number;
        } else {
            link.href = "https://wa.me/91" + number;
            link.target = "_blank";
        }
    });
</script>



<?php include('footer.php') ?>
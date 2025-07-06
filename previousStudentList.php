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

            <a href="viewStudents.php?class_name=<?php echo $class_name; ?>&id=<?php echo $id; ?>"><button class="btn btn-primary me-2 mb-2">Current Student List</button></a>
            <a href="previousStudentList.php?id=<?php echo $id; ?>&class_name=<?php echo $class_name; ?>"><button class="btn btn-primary me-2 mb-2">Previous Student List</button></a>

            <form method="POST" action="download_previous_students.php" style="display: inline;">
                <input type="hidden" name="class_name" value="<?php echo $class_name; ?>">
                <button type="submit" class="btn btn-success mb-2">Download Previous Student List (CSV)</button>
            </form>

        </div>
        <?php
        $slno = 0;
        $result = mysqli_query($conn, "SELECT * FROM `student` WHERE `class_name`='$class_name' and `action`='Inactive' ORDER BY `id` DESC");

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

            <div class="classList">
                <div class="container-ClassList">
                    <b>
                        Previous Students in <span style="color: #007bff;"><?php echo $class_name; ?></span>
                    </b>
                    <b>
                        <h2 id="h1id01">Total <?php echo $class_name; ?> Students</h2>
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

                        <div class="card">
                            <div class="menu-container">
                                <button class="menu-btn">⋮</button>
                                <div class="dropdown-menu">
                                    <a href="#" class="menu-link edit-link" data-description="<?php echo htmlspecialchars($description); ?>" onclick="showDescription(this)">Stuedent Description</a>
                                    <a href="studentSinglePage.php?id=<?php echo $item_id; ?>&class_name=<?php echo $class_name; ?>&class_id=<?php echo $id; ?>" class="menu-link edit-link">Student Details</a>
                                    <a href="studentDelete.php?id=<?php echo $item_id; ?>&class_name=<?php echo $class_name; ?>&class_id=<?php echo $id; ?>" class="menu-link delete-link" onclick="return confirm('Are you sure you want to delete this student?');">Delete Student</a>
                                </div>
                            </div>
                            <h3 class="enquiry-id"><?php echo $studentName; ?></h3>
                            <h4 style="display: none;"><?php echo $studentId; ?></h4>
                            <div class="student-badge">


                            </div>
                            <div class="course-badge">
                                <a id="callLink" href="#"><?php echo $mobile; ?></a>
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

                    <!-- Batch Description Modal -->
                    <div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Batch Description</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="modalDescriptionText">
                                    <!-- Description will be shown here -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="pagination" id="pagination"></div>
                </div>
            </div>


            <!-- ./col -->
    </div><!-- /.row -->
</div><!-- /.row -->


<script>
    function showDescription(element) {
        var description = element.getAttribute('data-description');
        document.getElementById('modalDescriptionText').innerText = description;
        $('#descriptionModal').modal('show');
    }
</script>


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
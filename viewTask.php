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
<style>
    .menu-container {
        position: relative;
    }

    .card {
        overflow: visible;
    }

    .dropdown-menu {
        display: none;
    }

    .dropdown-menu.show {
        display: block;
    }

    .dropdown-menu.show a {
        text-decoration: none;
        margin: 5px;
        padding: 10px;
    }
</style>
<div class="content-wrapper">
    <div class="container-table">
        <br>

        <div class="d-flex flex-wrap justify-content-end mb-3 gap-2">
            <a href="studentDetails.php?id=<?php echo $id; ?>"><button class="btn btn-success me-2 mb-2">Back</button></a>

        </div>
        <br>

        <b>
            Tasks in <span style="color: #007bff;"><?php echo $class_name; ?></span>
        </b>

        <div class="classList">
            <div class="container-ClassList">

                <b>
                    <h2 id="h1id01">Total <?php echo $class_name; ?> Tasks</h2>
                </b>

                <?php
                $countResult = mysqli_query(
                    $conn,
                    "SELECT COUNT(*) AS total
     FROM tasks
     WHERE class_name='$class_name'"
                );

                $countRow = mysqli_fetch_assoc($countResult);
                $taskCount = $countRow['total'];
                ?>

                <div class="summary">
                    <div class="summary-card">
                        <h2 id="enquiryCount">
                            <?php echo $taskCount; ?>
                        </h2>
                        <p>Total Tasks</p>
                    </div>
                </div>

                <div class="filters">
                    <input type="text" id="searchInput" placeholder="Search Batch Number, Date or Time" />
                    <button id="resetBtn">Reset Filters</button>
                </div>

                <div id="enquiryList" class="card-grid">

                    <?php
                    $result = mysqli_query(
                        $conn,
                        "SELECT *
                         FROM tasks
                         WHERE class_name='$class_name'
                         ORDER BY id DESC"
                    );

                    while ($row = mysqli_fetch_assoc($result)) {

                        $task_id = $row['id'];
                        $taskId = $row['taskId'];
                        $task_name = $row['task_name'];
                        $google_form = $row['google_form'];
                        $google_sheet = $row['google_sheet'];
                        $created_date = $row['created_date'];
                    ?>

                        <div class="card">

                            <div style="display: flex; justify-content:space-between">
                                <div class="card-header">
                                    <div>
                                        <strong>Created Date</strong><br>
                                        <?php echo date("d/m/Y", strtotime($created_date)); ?>
                                    </div>
                                </div>

                                <div class="menu-container">
                                    <button class="menu-btn">⋮</button>

                                    <div class="dropdown-menu" style="width: 150px;">
                                        <div>
                                            <a href="editTask.php?id=<?php echo $task_id; ?>">
                                                Edit Task
                                            </a>
                                        </div>

                                        <div style="margin-top: 10px;">
                                            <a href="deleteTask.php?id=<?php echo $task_id; ?>&class_name=<?php echo $class_name; ?>&class_id=<?php echo $id; ?>"
                                                onclick="return confirm('Delete this task?');">
                                                Delete Task
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h3 class="enquiry-id">
                                <?php echo $task_name; ?>
                            </h3>

                            <h5>
                                <?php echo $taskId; ?>
                            </h5>

                            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                                <div class="course-badge mt-3">
                                    <a
                                        href="<?php echo $google_form; ?>"
                                        target="_blank"
                                        class="btn btn-primary btn-sm" style="color: #fcfcfd;">
                                        Google Form
                                    </a>
                                </div>

                                <?php if (!empty($google_sheet)) { ?>

                                    <div class="course-badge mt-2">
                                        <a
                                            href="<?php echo $google_sheet; ?>"
                                            target="_blank"
                                            class="btn btn-success btn-sm" style="color: #fcfcfd;">
                                            Spreadsheet
                                        </a>
                                    </div>

                                <?php } ?>

                            </div>

                            <br>
                        </div>

                    <?php } ?>


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
    document.querySelectorAll('.menu-btn').forEach(btn => {
        btn.onclick = function(e) {
            e.stopPropagation();
            this.nextElementSibling.classList.toggle('show');
        };
    });

    document.addEventListener('click', () => {
        document.querySelectorAll('.dropdown-menu')
            .forEach(m => m.classList.remove('show'));
    });
</script>

<script>
    function showDescription(element) {
        var description = element.getAttribute('data-description');
        document.getElementById('modalDescriptionText').innerText = description;
        $('#descriptionModal').modal('show');
    }
</script>


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
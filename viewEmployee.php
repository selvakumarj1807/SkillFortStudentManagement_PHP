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
    <div class="container-table">


        <div class="classList">
            <div class="container-ClassList">

                <b>
                    <h2 id="h1id01">Total Employees</h2>
                </b>

                <div class="summary">
                    <div class="summary-card">
                        <h2 id="enquiryCount">0</h2>
                    </div>
                </div>

                <div class="filters">
                    <input type="text" id="searchInput" placeholder="Search Name, Role or Mobile" />
                    <button id="resetBtn">Reset Filters</button>
                </div>
                <div id="enquiryList" class="card-grid">
                    <?php
                    $count = 0;
                    $sql = "
                        SELECT e.*, r.role_name 
                        FROM employees e
                        LEFT JOIN employee_roles r ON r.id = e.role_id
                        ORDER BY e.id DESC
                    ";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $count++;
                    ?>

                        <div class="card">
                            <div class="menu-container">
                                <button class="menu-btn">⋮</button>
                                <div class="dropdown-menu">
                                    <!--<a href="#" class="menu-link edit-link" data-description="<?php echo htmlspecialchars($description); ?>" onclick="showDescription(this)">Stuedent Description</a> -->
                                    <a href="addEmployee.php?edit=<?= $row['id'] ?>" class="menu-link edit-link">Employee Details</a>
                                    <a href="addEmployee.php?delete=<?= $row['id'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this employee?');">
                                        Delete
                                    </a>

                                </div>
                            </div>
                            <h3 class="enquiry-id"><?= htmlspecialchars($row['employee_name']) ?></h3>
                            <h4 class="student-badge"><?= htmlspecialchars($row['role_name'] ?? 'N/A') ?></h4>

                            <div class="course-badge">
                                <a class="callLink" href="#"><?= htmlspecialchars($row['mobile']) ?></a>
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
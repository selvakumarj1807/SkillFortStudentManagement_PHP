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

    <div class="studentDetailsContainer">
        <h2 style="text-align:center;">Employees</h2>
        <br>
        <div class="tile-container">
            <?php if (!empty($_SESSION['username']) && $_SESSION['username'] === 'superadmin'): ?>
                <a href="addRole.php">
                    <div class="tile"> Add Role </div>
                </a>
            <?php endif; ?>

            <?php if (!empty($_SESSION['username']) && $_SESSION['username'] === 'superadmin'): ?>
                <a href="addEmployee.php">
                    <div class="tile"> Add Employee </div>
                </a>
            <?php endif; ?>
            <a href="viewEmployee.php">
                <div class="tile"> View Employee </div>
            </a>
            <?php if (!empty($_SESSION['username']) && $_SESSION['username'] === 'superadmin'): ?>
                <a href="takeEmployeeAttendance.php">
                    <div class="tile">Take Attendance</div>
                </a>
            <?php endif; ?>

            <a href="viewEmployeeAttendance.php">
                <div class="tile"> View Attendance</div>
            </a>
            <a href="employeeAttendanceDetails.php">
                <div class="tile"> Attendance Details </div>
            </a>
        </div>
    </div>


</div>
<?php include('footer.php') ?>
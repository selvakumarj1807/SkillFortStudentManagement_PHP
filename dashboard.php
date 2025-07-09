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



$row1 = mysqli_query($conn, "Select * from category");
$cat = mysqli_num_rows($row1);
//echo $cont;



$row7 = mysqli_query($conn, "Select * from products");
$product = mysqli_num_rows($row7);

?>
<?php include('header.php') ?>
<style>
  .small-box {
    margin-bottom: 20px;
  }
</style>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <!- small box ->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>Course</h4>
              <h4 style="color:white;text-align:center;font-size: 40px;"><?php echo $cat; ?></h4>
              <h4>&nbsp;</h4>
            </div>
            <div class="icon">
              <img src="img/pin.png" width='60' height='60' />
            </div>
            <a href="course.php" class="small-box-footer">Add Course <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>

      <?php
      $result = mysqli_query($conn, "SELECT * FROM category");
      while ($row_result = mysqli_fetch_array($result)) {
        $c_id = $row_result['c_id'];
        $category = $row_result['category'];
      ?>

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4><?php echo $category; ?> - Students</h4>
              <?php
              $row2 = mysqli_query($conn, "SELECT * FROM student WHERE course='$category'");
              $cont = mysqli_num_rows($row2);
              ?>
              <h4 style="color:white;text-align:center;font-size: 40px;"><?php echo $cont; ?></h4>
              <h4>&nbsp;</h4>
            </div>
            <div class="icon">
              <img src="img/members.png" width="60" height="60" />
            </div>
            <a href="viewAllStudents.php?category=<?php echo $category; ?>" class="small-box-footer">
              View Students <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

      <?php } ?>
    </div>

</div>
</section>
</div>

<?php include('footer.php') ?>
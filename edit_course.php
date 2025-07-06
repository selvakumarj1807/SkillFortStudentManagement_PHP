<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Ecom";
$id = $_REQUEST["id"];

if (!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
{
  header("Location:index.php");
  exit();
}

?>
<?php include('header.php') ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Course Name
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
 
    <div class="box-body">
      <form role="form" action="update_course.php" method="POST" enctype="multipart/form-data">

        <?php
        $result = mysqli_query($conn, "SELECT * FROM `category` where id = '$id' ") or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
          $id = $row['id'];
          $category = $row['category'];

          $image = $row['image'];
        }  ?>
        <!-- text input -->

        <input type="hidden" name="id" value="<?php echo $id; ?>" />


        <!-- textarea -->

        <div class="col-md-4">


          <div class="form-group">
            <label for="ban">Course Name</label>
            <input class="form-control" type="text" name="category" value="<?php echo $category; ?>" />

          </div>
          <div class="col-md-4">
            <div class="input-wrap">
              <label for="save">Image </label>
              <input type="file" name="image" accept="image/jpeg" value="<?php echo $image; ?>">
              <input class="file-path validate" type="hidden" placeholder="Choose your profile image">

            </div>

          </div>
          <br>
          <br>
          <br>

          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="course.php"><button type="button" class="btn btn-primary">Back</button></a>

        </div><!-- /.box-body -->
    </div>

    </form>

  </section><!-- /.content -->


  <!--/////////////////////////////////////////////////////////////////////////-->
</div>


<?php include('footer.php') ?>
<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "Skill Fort";
//$id = $_REQUEST["id"];

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
      Add Course </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">


      <div class="col-lg-12">

        <div class="box box-warning">
          <div class="box-header">

          </div><!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="save_course.php" method="POST" enctype="multipart/form-data">


              <!-- text input -->


              <!-- textarea -->
              <div class="form-group">
                <label for="ban">Course Name</label>
                <input class="form-control" id="ban" name="category" />
                <br>



                <div class="input-wrap">
                  <label for="save">Images</label>
                  <input type="file" name="image" accept="image/jpeg" required>
                  <input class="file-path validate" type="hidden" placeholder="Choose your profile image">

                </div>

                <br>

                <button type="submit" class="btn btn-primary">Submit</button>


              </div><!-- /.box-body -->
          </div>





          </form>

          <section class="content-header">
            <h3>
              Course List
            </h3>
          </section>
          <br>
          <br />


          <div id="table-content">
            <table class="table table-hover table-bordered">
              <thead class="thead-light ">
                <tr>
                  <th>Id</th>
                  <th>Course Name</th>
                  <th>Image</th>

                  <th class="text-center">Actions</th>

                </tr>
              </thead>
              <tbody>
                <?php
                require('db.php');
                $slno = 0;
                $result = mysqli_query($conn, "SELECT * FROM category");
                while ($row_result = mysqli_fetch_array($result)) {
                  $slno++;
                  $item_id = $row_result['id'];


                  $category = $row_result['category'];
                  $image = $row_result['image'];
                ?>
                  <tr>
                    <td><?php echo $slno; ?></td>

                    <td><?php echo $category; ?></td>
                    <td><img class="img-responsive" width="40" height="55" src="Upload/<?php echo $image; ?>" /></td>
                    <td class="text-center">
                      <a href="edit_course.php?id=<?php echo $row_result['id']; ?>">Edit<i class="fa fa-edit" style="color:green"></i></a> &nbsp;&nbsp;&nbsp;
                      <a href="remove_course.php?id=<?php echo $row_result['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Remove<i class="fa fa-trash" aria-hidden="true" style="color:red"></i></a>&nbsp;&nbsp;&nbsp;
                    </td>


                  </tr>
                <?php
                }
                ?>
              </tbody>
              <table>

          </div>

        </div><!-- /.box -->
      </div><!--/.col (right) -->
    </div> <!-- /.row -->
  </section><!-- /.content -->

  <!--/////////////////////////////////////////////////////////////////////////-->
</div>


<?php include('footer.php') ?>
<?php
session_start();
require 'db.php';
$username = $_SESSION["username"];
$company_name = "RV Satellite Network";

if (!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
{
  header("Location:index.php");
  exit();
}

?>
<?php include('header.php') ?>

<!-- Left side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Change Password

    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!--action="update_password.php"-->
        <div class="box box-warning">
          <div class="box-header">

          </div><!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="update_password.php" method="POST">
              <!-- text input -->
              <input type="hidden" name="user" id="user" class="form-control" value="<?php echo $username; ?>" />

              <div class="form-group">
                <label>New Password</label>
                <input type="text" name="new_password" id="new_password" class="form-control" placeholder="Enter New Password" />
              </div>

              <!-- textarea -->
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="text" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter Confirm Password" class="validate" />
              </div>

              <div class="box-footer" style="text-align:right">
                <button type="submit" id="sbtn" name="submit" class="btn btn-primary">Update Password</button>
              </div>


              <div id="message"></div>


          </div><!-- /.box-body -->
        </div>

      </div><!--/.col (left) -->

      </form>
    </div><!-- /.box-body -->

  </section><!-- /.content -->
</div>

<?php include('footer.php') ?>
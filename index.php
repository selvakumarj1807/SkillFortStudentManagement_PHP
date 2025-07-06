<?php
session_start();
require 'db.php';
$company_name = "Skill Fort";


if (isset($_SESSION['username']))
// Checking whether the session is already there or not if                 // true then header redirect it to the home page directly
{
  session_destroy();
  header("Location:index.php");
}

if (isset($_POST['login'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];

  $res = mysqli_query($conn, "SELECT * FROM admin") or die(mysqli_error($conn));
  while ($row_r = mysqli_fetch_array($res)) {
    $username = $row_r['username'];
    $password = $row_r['password'];


    if ($user == $username && $pass == $password) {
      $_SESSION['username'] = $user;

      echo "<script>alert('Login success!');</script>";
      echo '<script type="text/javascript"> window.open("dashboard.php","_self");</script>';            //  On Successful Login redirects to home.php
    }
  }
}
?>



<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title>Skill Fort</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- FontAwesome 4.3.0 -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons 2.0.0 -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
  <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <!-- iCheck -->
  <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
  <!-- Morris chart -->
  <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
  <!-- jvectormap -->
  <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
  <!-- Date Picker -->
  <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
  <!-- Daterange picker -->
  <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <!-- bootstrap wysihtml5 - text editor -->
  <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />


</head>

<body class="skin-blue" style="background-color:#ecf0f5;">
  <br><br><br>

  <div class="col-lg-3">
  </div>

  <div class="col-lg-6">
    <!-- Navy tile -->
    <div class="box box-solid bg-purple" style="padding:20px;">
      <div class="box-header">
      </div>
      <div class="small-box bg-purple">
        <div class="inner">
          <h3>Admin Login</h3>

          <div class="icon">
            <i class="ion ion-user"></i>
          </div>
          <form role="form" method="POST">
            <!-- text input -->

            <div class="form-group">
              <label>UserName</label>
              <input type="text" name="username" class="form-control" placeholder="Username" />
            </div>

            <div class="form-group">
              <label>Password </label>
              <input type="password" name="password" class="form-control" placeholder="Password" />
            </div>

            <div class="form-group">
              <button type="submit" name="login" class="btn btn-primary"><i class="fa fa-arrow-right"></i> &nbsp; Login</button>
            </div>

          </form>
        </div>
      </div>
      <div class="box-body">
        Note : Your account details informations will never share with anyone.

      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->

  <div class="col-lg-3">
  </div>

  <br>
  <br>
  <br>
  <div class="col-lg-12 text-center" style="position:fixed;bottom:20px;width:100%;">
    Tamilinfotechnology | &copy 2022
  </div>
  <!--/////////////////////////////////////////////////////////////////////////-->



  <!-- jQuery 2.1.3 -->
  <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <!-- jQuery UI 1.11.2 -->
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- Morris.js charts -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
  <!-- Sparkline -->
  <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
  <!-- daterangepicker -->
  <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
  <!-- datepicker -->
  <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  <!-- Slimscroll -->
  <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <!-- FastClick -->
  <script src='plugins/fastclick/fastclick.min.js'></script>
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js" type="text/javascript"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js" type="text/javascript"></script>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="dist/js/app.min.js"></script> <!-- AdminLTE's main JS -->

</body>

</html>
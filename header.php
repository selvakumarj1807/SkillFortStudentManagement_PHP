<?php

require 'db.php';
$username = $_SESSION["username"];
$company_name = "Skill Fort";

if (!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
{
  header("Location:index.php");
  exit();
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skill Fort</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
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

  <!-- Bootstrap 3 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <!-- DataTables for Bootstrap 3 -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">

  <link rel="icon" type="image/png" href="img/SkillfortAppLogo.png">
  
  <style>
    .anyClass {
      height: 350px;
      overflow-y: scroll;
    }

    .container-table {
      margin: 15px;
      padding: 5px;
    }


    .classList {
      font-family: Arial, sans-serif;
      margin: 20px;
      /*background: #f4f4f4;*/
    }

    .container-ClassList {
      /*
      max-width: 1000px;
      margin: 0 auto;
      background: white;
      padding: 10px;
      */
      border-radius: 10px;
    }

    #h1id01 {
      text-align: center;
      margin-bottom: 20px;
    }

    .summary {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .summary-card {
      background: teal;
      color: white;
      padding: 5px 25px;
      border-radius: 10px;
      text-align: center;
    }

    .filters {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-bottom: 20px;
    }

    .filters input {
      padding: 10px;
      font-size: 16px;
      width: 100%;
    }

    .filters button {
      padding: 10px;
      background: blue;
      color: white;
      border: none;
      cursor: pointer;
    }

    .card-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 15px;
    }

    @media(min-width: 600px) {
      .filters {
        flex-direction: row;
        justify-content: space-between;
      }

      .card-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }

    .card {
      background: white;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 15px;
      text-align: center;
      transition: 0.3s;
    }

    .card:hover {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .card .enquiry-id {
      color: orange;
      font-weight: bold;
    }

    .course-badge a {
      text-decoration: none;
      color: green;
      /* You can set your preferred color */
      font-weight: bold;
    }

    .course-badge a:hover {
      color: darkgreen;
    }

    .student-badge a {
      text-decoration: none;
      color: blue;
      /* You can set your preferred color */
      font-weight: bold;
    }

    .student-badge a:hover {
      color: darkblue;
    }

    .card-footer {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      margin-top: 25px;
    }

    .pagination {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      margin-top: 20px;
      gap: 5px;
    }

    .pagination button {
      padding: 5px 10px;
      border: 1px solid #ccc;
      background: #eee;
      cursor: pointer;
    }

    .pagination button.active {
      background: blue;
      color: white;
    }

    .menu-container {
      position: relative;
      text-align: right;
    }

    .menu-btn {
      background: none;
      border: none;
      font-size: 20px;
      cursor: pointer;
    }

    .dropdown-menu {
      position: absolute;
      top: 25px;
      right: 0;
      background: white;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
      display: none;
      flex-direction: column;
      z-index: 1;
      min-width: 100px;
    }

    .dropdown-menu button {
      padding: 8px 12px;
      background: white;
      border: none;
      text-align: left;
      cursor: pointer;
    }

    .dropdown-menu button:hover {
      background: #eee;
    }

    .menu-link {
      padding: 8px 12px;
      display: block;
      background: white;
      color: black;
      text-decoration: none;
      text-align: left;
      cursor: pointer;
    }

    .menu-link:hover {
      background: #eee;
      color: blue;
    }

    .studentDetailsContainer {
      font-family: Arial, sans-serif;
      margin: 20px;
      background-color: #f4f4f4;
      padding: 20px;
    }

    .tile-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .tile {
      flex: 1 1 200px;
      background-color: #007bff;
      color: white;
      padding: 20px;
      text-align: center;
      font-weight: bold;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
      min-width: 200px;
    }

    .tile:hover {
      background-color: #0056b3;
      transform: translateY(-5px);
    }

    @media (max-width: 600px) {
      .tile {
        flex: 1 1 100%;
      }
    }
  </style>

</head>

<body class="skin-blue sidebar-mini">

  <div class="wrapper">
    <header class="main-header">
      <a href="dashboard.php" class="logo">
        <b>Skill Fort</b>
      </a>

      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button -->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="container-fluid">
          <!-- Mobile Toggle for Navbar Links -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-menu">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div class="collapse navbar-collapse" id="navbar-collapse-menu">
            <ul class="nav navbar-nav">
              <li><a href="dashboard.php">Dashboard</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle">
                  Welcome <?php echo $username; ?>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Profile</a></li>
                  <li><a href="logout.php">Sign out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">

        <!-- User Panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
          </div>
          <div class="pull-left info">
            <p><?php echo $username; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
          <li class="active">
            <a href="dashboard.php">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Skill Fort Batch</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <?php
              $result = mysqli_query($conn, "SELECT * FROM category");
              while ($row_result = mysqli_fetch_array($result)) {
                $c_id = $row_result['c_id'];
                $category = $row_result['category'];
              ?>
                <li>
                  <a href="product.php?category=<?php echo $category; ?>">
                    <i class="fa fa-book"></i>
                    <?php echo $category; ?>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>

          <li>
            <a href="changepassword.php">
              <i class="fa fa-lock"></i> <span>Change Password</span>
            </a>
          </li>

          <li>
            <a href="logout.php">
              <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
          </li>

        </ul>
      </section>
    </aside>
  </div>
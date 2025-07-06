<?php 
session_start();
 require 'db.php';
$username = $_SESSION["username"];
$company_name="Skill Fort";
//$category=$_GET["category"];


if(!isset($_SESSION['username'])) // If session is not set then redirect to Login Page
 {
     header("Location:index.php");
     exit();
 }

?>
<?php include('header.php')?>

<style>
.anyClass {
  height:350px;
  overflow-y: scroll;
}
</style>
<body>
     <div class="content-wrapper">
      <div class="container">
      <br>
      <section class="content-header">
          <h1>
           CHECKOUT  
          </h1>          
        </section>
<br>
<br/>
<!--<div class="form-group float-right">
        <a href="partnersadd.php?category=<?php echo $category;?>"><button class="btn btn-success">Add Pr</button></a>
</div>-->

<div id="action-page-nav" class="anyClass">
<div id="table-content">
<table class="table table-hover table-bordered">
<thead class="thead-light ">
<tr>
		<th>Id</th>
		<th>Phone</th>
		<th>FullName</th>
		<th>Contact Number</th>
		<th>Landmark</th>
		<th>City</th>
		<th>Address</th>
        <th>Date</th>
		<th>Total</th>
		<th>Pay_type</th>
		<th>Status</th>
</tr>
</thead>
<tbody>
<?php
$slno=0;
				$result =mysqli_query($conn,"SELECT * FROM `checkout`");
				
				while ($row_result=mysqli_fetch_array($result))
				{	$slno++;
			        $phone=$row_result['phone'];
					$fullname=$row_result['fullname'];
					$contact_no=$row_result['contact_no'];
					$landmark=$row_result['landmark'];
					$city=$row_result['city'];
					$address=$row_result['address'];
				
					$date_time=$row_result['date_time'];
					$total=$row_result['total'];
					$pay_type=$row_result['pay_type'];
					$status=$row_result['status'];
					
					
					//$saleqty=$row_result['saleqty'];
					//$description=$row_result['description'];
                   

				  ?>
				   <tr>
					        <td><?php echo $slno;?></td>
							<td><?php echo $phone;?></td>
					
					        <td><?php echo $fullname;?></td>
							<td><?php echo $contact_no;?></td>
							<td><?php echo $landmark;?></td>
							<td><?php echo $city;?></td>
							<td><?php echo $address;?></td>
							<td><?php echo $date_time;?></td>
							<td><?php echo $total;?></td>
							<td><?php echo $pay_type;?></td>
							<td><button style="background-color:white;"><?php echo $status;?></button></td>
						
	
		 <!------- <td class="text-center" >
			  <a href="edit_checkout.php?id=<?php echo $row_result['id'];?>"><i class="fa fa-edit" style="color:red"></i></a> &nbsp;&nbsp;&nbsp;
			  <a href="remove_checkout.php?id=<?php echo $row_result['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
			 
			</td>----------->
				
          
				
				   </tr>
				 <?php
					}
					?>
</tbody>
<table>


</div>














</div>
            <!-- ./col -->
          </div><!-- /.row -->
          </div><!-- /.row -->
          <!-- Main row -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet"/>

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
  </body>
</html>
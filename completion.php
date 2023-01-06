<?php
ob_start();
session_start(); 
include('connect.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Project Tracking System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body style="background-color:#bbeefc;">

<div class="wrapper"> 
    <div class="sidebar" data-color="blue" >

    	<div class="sidebar-wrapper" style="background-color:#9ad9ea;">
            <div class="logo">
                <a href="index.php" class="simple-text">
                  
                </a>
            </div>

            <?php include "admin-menu.php" ?>
    	</div>
    </div>

    <div class="main-panel">
        <?php include "admin-top-menu.php" ?>
								<?php
								error_reporting(E_ERROR | E_PARSE);
require_once "connect.php";
$query = "select * from grouptask where position='Team Leader'";
$data = mysql_query($query);
									
								?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header" style="background-color:#bbeefc;">
                                <h4 class="title">Task List</h4>
                            </div>
                            <div class="content table-responsive table-full-width" style="background-color:#bbeefc;">
                           
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Group Name</th>
                                    	<th>Task Name</th>
                                        <th>Completion</th>
   
                                    </thead>
                                     <?php while($rec = mysql_fetch_array($data)) { ?>
                                    <tbody>
                                        <tr>
                                        	<td><?php echo $rec['gname']; ?></td>
                                        	<td><?php echo $rec['tname']; ?></td>
                                            <td><?php echo $rec['status']; ?></td>
                                        </tr>
                                        
                                    </tbody>
                                    <?php } ?>
                                </table>
                                
                            </div>
                        </div>
                    </div>


                    

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> 
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>

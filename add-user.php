<?php
ob_start();
session_start(); 
include('connect.php');
$err_msg=$suces_msg="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$uname=mysql_real_escape_string($_POST['uname']);
$userid=mysql_real_escape_string($_POST['userid']);
$position=mysql_real_escape_string($_POST['position']);
$gname=mysql_real_escape_string($_POST['gname']);
$password=mysql_real_escape_string($_POST['password']);

mysql_query ("insert into users(uname,userid,position,gname,password) values ('$uname','$userid','$position','$gname','$password')");


$suces_msg="done";


}
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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header" style="background-color:#bbeefc;">
                                <h4 class="title">Add User</h4>
                            </div>
                            <?php 
			if($suces_msg=="done")
			{
			echo"<br/><table style='border:solid 3px #009900;border-radius:5px;' align='center' width='40%'>
			<tr><td  align='center' height='25px' style='text-decoration:none; color:#009900; font-size:14px'> User Added successfully.</td></tr>
			</table><br/>";
			}
			
			if (!$err_msg=="")	
			{
			echo"<br/><table style='border:solid 3px #FF0000;border-radius:5px;' align='center' width='40%'>
			<tr><td  align='center' height='25px' style='text-decoration:none; color:#FF0000; font-size:14px'> &nbsp;&nbsp;
			$err_msg</td></tr>
			</table><br/>";
			}
				
			?>
                            <div class="content" style="background-color:#bbeefc;">
                                <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Full Name" name="uname">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>User ID.</label>
                                                <input type="text" class="form-control" placeholder="Roll Number" name="userid" value="<?php
						echo $randnum = rand(1111,9999);
						?>" readonly> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Position</label>
                                                <select class="form-control" name="position" required>
                                                	<option value="">Select</option>
                                                    <option value="Team Leader">Team Leader</option>
                                                    <option value="Developer">Developer</option>
                                                </select>
                                                
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Group Name</label>
                                               <select name="gname" id='gname' class="form-control">
                  
                                              <option value="select" >Select</option>         
                                                <?php
                                                    $sql=mysql_query("SELECT gname FROM groups"); 
                                                    while ($row = mysql_fetch_object($sql)) {  
                                                    
                                                    echo  "<option value= \"$row->gname\">$row->gname</option>" ; 
                                                    } 
                                                    ?> 
                                                     
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Password" name="password">
                                            </div>
                                        </div>
                                    </div>
									
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid"  style="background-color:#bbeefc;">
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

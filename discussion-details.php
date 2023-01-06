<?php
ob_start();
session_start(); 
include('connect.php');
if(isset($_REQUEST['btnSubmit'])) 
    {
        $uname = $_REQUEST['uname'];
        $userid = $_REQUEST['userid'];
        $topicid = $_REQUEST['topicid'];
        $content = $_REQUEST['content'];

        $query = "insert into comments (uname,userid,topicid,content) values ('$uname','$userid','$topicid','$content')";
        if(mysql_query($query))
        {
            echo '<script language="javascript">';
            echo 'alert("Comments Added Successfully!")';
            echo '</script>';
            } 
            else 
            {
            echo '<script language="javascript">';
            echo 'alert("Unable to Add!")';
            echo '</script>';
        }
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
<style type="text/css">
    
    .cmd {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
</style>
</head>
<body style="background-color:#bbeefc;">

<div class="wrapper"> 
    <div class="sidebar" data-color="blue" >

    	<div class="sidebar-wrapper" style="background-color:#9ad9ea;">
            <div class="logo">
                <a href="index.php" class="simple-text">
                  
                </a>
            </div>

            <?php include "user-menu.php" ?>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid" style="background-color:#9ad9ea;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">  <b> PROJECT TRACKING SYSTEM </b></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
								<?php
								error_reporting(E_ERROR | E_PARSE);
								$userid = $_SESSION['userid'];
require_once "connect.php";
    
    
$query1 = "select * from users where userid='$userid'";
    $data1 = mysql_query($query1);
			while($rec1 = mysql_fetch_array($data1)) { 
                $uname = $rec1['uname'];
            }						
								?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header" style="background-color:#bbeefc;">
                                <h4 class="title">Discussion Details</h4>
                            </div>
                            <div class="content table-responsive table-full-width" style="background-color:#bbeefc;">
                           
                                <?php $userid; ?>

                                <?php $uname; 
$post_id = isset($_REQUEST['post_id']) ? $_REQUEST['post_id'] : "0";
$query2 = "select * from topic where id='$post_id'";
    $data2 = mysql_query($query2);
            while($rec2 = mysql_fetch_array($data2)) { 
                $categoryName = $rec2['categoryName'];
                $topic = $rec2['topic'];
                $date = $rec2['date'];
                $id = $rec2['id'];
            }                      

                                ?>

                                <h4 style="color:#e10000">Topic Title :  <?php echo $topic; ?></h4>
                                <h5>Topic Category :  <?php echo $categoryName; ?></h5>
                                <h5>Date Time Posted :  <?php echo $date; ?></h5>

                                <h3 style="color:#e10000">Comments</h3>
                                <table class="table table-hover table-striped">
                                   
                                    <tbody>
                                        <?php
    $query3 = "select * from comments where topicid='$post_id'";
    $data3 = mysql_query($query3);
    while($rec3 = mysql_fetch_array($data3)) { ?>
                                        <tr>
                                            <td style="background-color: #fff">
                                                
                                                <div class="cmd">
                                                       <?php echo $rec3['content']; ?>
                                                </div>
                                                Comment by: <?php echo $rec3['uname']; ?> | 
                                                Userid: <?php echo $rec3['userid']; ?>
                                            </td>
                                        </tr>
                                         <?php } ?>
                                    </tbody>
                                    
                                </table>
                        <form method="post" style="background-color: #9ad9ea; padding: 20px; border-radius: 25px;">
                                <label>Comment</label>
                                <input type="text" name="topicid" value="<?php echo $id?>" style="display: none;" >
                                <input type="text" name="uname" value="<?php echo $uname?>" style="display: none;">
                                <input type="text" name="userid" value="<?php echo $userid?>" style="display: none;">
                        <textarea name="content"class="form-control"></textarea> <br>

                         <button type="submit" class="btn btn-info btn-fill pull-right" name="btnSubmit">Submit</button>
</form>
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

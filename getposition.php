<?php
ob_start();
session_start(); 
include_once('connect.php');
$grade_val=$_POST['grade_val'];
$query_data=mysql_query("select userid,position,gname from users where uname='$grade_val'");
$data=mysql_fetch_array($query_data);
echo $data[0]."|".$data[1]."|".$data[2];
?>

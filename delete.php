<?php 
require_once "connect.php";
$msg = "";
$mid = isset($_REQUEST['mid']) ? $_REQUEST['mid'] : "0";
$query = "delete from message where mid=".$mid;
if(mysql_query($query)) {
header("location:inbox.php");
} else {
echo "unable to delete!";
}
?>
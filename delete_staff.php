<?php
session_start();
include_once("dbconnect.php");
$firstname=$_GET['firstname'];

$result=mysql_query("delete staff.* from staff where (firstname='$firstname')");

if($result==FALSE)
{
	die("Delete Was not successful!!! ".mysql_error());
}
else
{
	$_SESSION['message']="Delete Was successfull!!!!";
	$_SESSION['messagetype']="sucessmessage";
	header("location: manage_staff.php");
    exit();
}
?>
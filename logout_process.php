<?php 
session_start();
include_once("dbconnect.php");

	session_destroy();
	$_SESSION['message']="Logout  Was Sucessfull";
	$_SESSION['messagetype']="successmessage";
	header("location: index.php");
	exit();

 
?>
<link href="styles.css" rel="stylesheet" type="text/css">

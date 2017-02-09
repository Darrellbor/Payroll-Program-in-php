<link href="styles.css" rel="stylesheet" type="text/css">
<?php 
include_once("dbconnect.php");
session_start();
$username=$_GET['username'];
//.echo username

$result=mysql_query("delete users.* from users where (username='$username')");

if($result==FALSE)
{
	die("Delete Was not successful!!! ".mysql_error());
}
else
{
	
	$_SESSION['message']="Delete Was successfull!!!!";
	$_SESSION['messagetype']="sucessmessage";
	header("location: manage_users.php");
    exit();
}
?>


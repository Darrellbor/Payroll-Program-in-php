<?php
	session_start();
	include_once("dbconnect.php");
	
	echo crypt(md5($password));
	
	$username=isset($_POST['username']) ? trim($_POST['username']) : "";
	$password=isset($_POST['password']) ? md5($_POST['password']) : "";
	$name=isset($_POST['name']) ? trim($_POST['name']) : "";
	
	
	
	if($username=="" || $password=="" || $name=="")
	{
		$_SESSION['message']="Please Input Your Details";
		$_SESSION['messagetype']="errormessage";
		header("location: add_new_user.php");
		exit();
	}
	
	$select_user=mysql_query("select * from users where(username='$username')");
	if($select_user==FALSE)
	{
		$_SESSION['message']="Error encourted accessing user information!" .mysql_error();
		$_SESSION['messagetype']="errormessage";
		header("location: add_new_user.php");
		exit();
	}
	
	$total_users=mysql_num_rows($select_user); //Get the total Numebr of Records Returnd. 
	if($total_users>0)
	{
		$_SESSION['message']="This username ($username) already exist. please enter a different username! ";
		$_SESSION['messagetype']="errormessage";
		header("location: add_new_user.php");
		exit();
	}
	
	$insert_rec=mysql_query("insert into users set username='$username', password='$password', name='$name'");
	if($insert_rec==FALSE)
	{
			$_SESSION['message']="Error Encounterd adding user information! " .mysql_error();
			$_SESSION['messagetype']="errormessage";
			header("location: add_new_user.php");
			exit();
	}
	
	$_SESSION['message']="User ($username) has been succesfully added.";
	$_SESSION['messagetype']="sucessmessage";
	header("location: manage_users.php");
?>


	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
</body>
</html>
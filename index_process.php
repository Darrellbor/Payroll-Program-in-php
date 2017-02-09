<link href="styles.css" rel="stylesheet" type="text/css">
<?php
	session_start();
	include_once("dbconnect.php");
	
	$username=(isset($_POST['username'])) ? $_POST['username'] : "";
	$password=(isset($_POST['password'])) ? md5($_POST['password']) : "";
	
	if($username=="" || $password=="")
	{
		$_SESSION['message']="Please enter Username or Password";
		$_SESSION['messagetype']="errormessage";
		header("location: index.php");
		exit();
	}
	
	$check_db_for_username=mysql_query("select * from users where(username='$username' and password='$password')");
	if($check_db_for_username==FALSE)
	{
		$_SESSION['message']="Error Encounter accesing user information!" .mysql_error();
		$_SESSION['messagetype']="errormessage";
		header("location: index.php");
		exit();
	}
	$total_check_db_for_username=mysql_num_rows($check_db_for_username);
	if($total_check_db_for_username<=0)
	{
		$_SESSION['message']="Invalid Username and Pasword";
		$_SESSION['messagetype']="errormessage";
		header("location: index.php");
		exit();
	}
	mysql_data_seek($check_db_for_username,0);
	$row_check_db_for_username=mysql_fetch_assoc($check_db_for_username);

	$_SESSION['user_category']=$row_check_db_for_username['user_category'];
	$_SESSION['current_user']=$username;
	
	$_SESSION['message']="Succesfully Login!";
	$_SESSION['messagetype']="sucessmessage";
	header("location: home.php");
	exit();
?>
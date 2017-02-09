<?php
session_start();
include_once("dbconnect.php");

	
	$firstname=isset($_POST['firstname']) ? trim($_POST['firstname']) : "";
	$my_pix=isset($_POST['my_pix']) ? trim($_POST['my_pix']) : "";
	$lastname=isset($_POST['lastname']) ? trim($_POST['lastname']) : "";
	$position1=isset($_POST['position1']) ? trim($_POST['position1']) : "";
	$salary=isset($_POST['salary']) ? trim($_POST['salary']) : "";
	$allowances=isset($_POST['allowances']) ? trim($_POST['allowances']) : "";
	$deductions=isset($_POST['deductions']) ? trim($_POST['deductions']) : "";
	$net_pay=isset($_POST['net_pay']) ? trim($_POST['net_pay']) : "";
	
	$_SESSION['firstname']=$firstname;
	$_SESSION['my_pix']=$my_pix;
	$_SESSION['lastname']=$lastname;
	$_SESSION['position1']=$position1;
	$_SESSION['salary']=$salary;
	$_SESSION['allowances']=$allowances;
	$_SESSION['deductions']=$deductions;
	$net_pay['net_pay']=$net_pay;
	
	if($firstname=="" || $my_pix=="" || $lastname=="" || $position1=="" || $salary=="" || $allowances=="" || $deductions=="" || $net_pay=="")
	{
		$_SESSION['message']="Please Fill in the form" .mysql_error();
		$_SESSION['messagetype']="errormessage";
		header("location: add_staff.php");
		exit();
	}
	
	
		$select_staff=mysql_query("SELECT * from staff where(firstname='$firstname')");
		if($select_staff==FALSE)
	{
		$_SESSION['message']="Error encourted accessing user information!" .mysql_error();
		$_SESSION['messagetype']="errormessage";
		header("location: add_staff.php");
		exit();
	}
	
	
	
		$total_staff=mysql_num_rows($select_staff);
		if($total_staff>0)
		{
			$_SESSION['message']="Error Encountered accessing Staff Info!!" .mysql_error();
			$_SESSION['messagetype']="errormessage";
			header("location: add_staff.php");
			exit();
		}	
		
		$insert_rec=mysql_query("INSERT into staff set firstname='$firstname', my_pix='$my_pix', lastname='$lastname', position1='$position1', 						salary='$salary', allowances='$allowances', deductions='$deductions', net_pay='$net_pay'");
		if($insert_rec==FALSE)
		{
					$_SESSION['message']="Error Encountered Adding Staff Information!" .mysql_error();
					$_SESSION['messagetype']="errormessage";
					header("location: add_staff.php");
					exit();
		}
		
		unset($_SESSION['firstname'],$_SESSION['my_pix'],$_SESSION['lastname'],$_SESSION['position1'],$_SESSION['salary'],$_SESSION['allowances'],$_SESSION['deductions'],$_SESSION['net+pay']);
	$_SESSION['message']="Staff Have been Successfully Added";
	$_SESSION['messagetype']="sucessmessage";
	header("location: manage_staff.php");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
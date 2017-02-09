<?php
	session_start();
	error_reporting (0);
	//error_reporting (E_ALL);
	$duration=time() - $_SESSION['start_time'];
	if ($duration>(60*15) || !isset($_SESSION['username']))
	{
		$_SESSION['message']="Your session has expired. Please sign in again to continue...";
		unset($_SESSION['username']);
		echo '<meta http-equiv="refresh" content="0; URL=login.php"> ';
		exit();
	}
	$_SESSION['start_time']=time();
?>
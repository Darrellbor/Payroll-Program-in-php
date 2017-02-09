<?php
	session_start();
	$main_page="Home";
	include_once("dbconnect.php");
?>
<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>

<!-- InstanceBeginEditable name="doctitle" -->

<title>Nancin Christ Standard School
<?php 

if(isset($main_page))
{
	echo" : $main_page";
}

if(isset($sub_page))
{
	echo" : ($sub_page)";
}

if(isset($current_users))
{
	echo" : ($current_user)";
}

?>
</title>
<!-- InstanceEndEditable -->
<link href="styles.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div id="header">
<h1>Payroll</h1>
</div>
<div id="content">

    <?php
		if($main_page!="Login" && isset($_SESSION['current_user']))  
		{
			
			?>
            	<p align="right" style="border-bottom:solid 1px #ccc;"><b>User:</b> <?php echo $_SESSION['current_user'];?></p>
            <?php
		}
	?>
    
    
	<h1 align="center"> <?php echo $main_page; ?> </h1>
    <?php
		if(isset($_SESSION['message']))
		{
			?>
            	<p class="<?php echo $_SESSION['messagetype']; ?>"><?php echo $_SESSION['message']; ?></p>
            <?php
			unset($_SESSION['message'],$_SESSION['messagetype']);
		}
	?>
<!-- InstanceBeginEditable name="mycontent" -->
	
    <table align="center" cellpadding="10" cellspacing="1" border="0">  
    <?php
		//.if(isset($_SESSION['user_category']) && $_SESSION['user_category']=='user_category')
		{
			?>
				<tr bgcolor="#efefef">
                	<td style="font-size:18px; font-weight:bold;">&raquo;</td>
                    <td><a href="manage_users.php">Manage Users</a></td>
                </tr>
                <tr bgcolor="#cdcdcd">
                	<td style="font-size:18px; font-weight:bold;">&raquo;</td>
                    <td><a href="manage_staff.php">Manage Staffs</a></td>
                </tr>
				<tr bgcolor="#efefef">
                	<td style="font-size:18px; font-weight:bold;">&raquo;</td>
                    <td><a href="logout_process.php">Log Out</a></td>
                </tr>
            <?php
		}
	?>
    </table>
    
<!-- InstanceEndEditable -->
</div>

</body>
<!-- InstanceEnd --></html>
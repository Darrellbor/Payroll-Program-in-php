<?php
	session_start();
	$main_page="Add New User";
	include_once("Connections/dbconnect.php");
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
<p align="center"><a href="home.php">Home</a> | <a href="manage_users.php">Back To Manage Users</a></p>
<form action="add_new_user_process.php" method="post" id="myform">
	<table align="center" cellpadding="10" cellspacing="1">
    	<tr bgcolor="#efefef">
   		  <td>Username</td>
            <td><input name="username" type="text" id="username" /></td>
        </tr>
        <tr bgcolor="#cdcdcd">
        	<td>Password</td>
            <td><input name="password" type="password" id="password" /></td>
        </tr>
        <tr bgcolor="#efefef">
        	<td>Name</td>
            <td><input name="name" type="text" id="name" /></td>
        </tr>
        <tr bgcolor="#cdcdcd">
        	<td colspan="2" align="center"><input type="button" value="Add User" onclick="add_bttn()" /></td>
        </tr>
    </table>
    </form>
    <script type="text/javascript">
	document.getElementById("username").focus()
	function add_bttn()
	{
		if(document.getElementById("username").value=="")
		{
			alert("Please put in your Username");
			document.getElementById("username").focus()
			return null;
		}
		
		if(document.getElementById("password").value=="")
		{
			alert("Please put in your password");
			document.getElementById("password").focus()
			return null;
		}
		
		if(document.getElementById("name").value=="")
		{
			alert("Please put in your Name");
			document.getElementById("name").focus()
			return null;
		}
		document.getElementById("myform").submit()
	}
    </script>
<!-- InstanceEndEditable -->
</div>

</body>
<!-- InstanceEnd --></html>
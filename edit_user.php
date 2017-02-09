<?php 
$main_page="Edit User";
include_once("dbconnect.php");
session_start();
?>
<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>

<!-- InstanceBeginEditable name="doctitle" -->
<?php
if($current_user==FALSE)
{
	header("location: index.php");
}
?>
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
<p align="center"><a href="home.php">Home </a>| <a href="manage_users.php">Back To Users</a></p>
<?php
$id=isset($_GET['id']) ? ($_GET['id']) : "";
	$select_rec=mysql_query("select * from users where (id='$id')");
	if($select_rec==FALSE)
	{
		die("Error encounterd Editing id!!!" .mysql_error());
	}
	$total_rec=mysql_num_rows($select_rec);
	if($total_rec>0)
	{
			mysql_data_seek($select_rec,0);
			$rowp=mysql_fetch_assoc($select_rec);
			
			$username=isset($_POST['username']) ? $_POST['username'] : $rowp['username'];
			$password=isset($_POST['password']) ? $_POST['password'] : $rowp['password'];
			$name=isset($_POST['name']) ? $_POST['name'] : $rowp['name'];
	}
?>

<form action="edit_user_process.php" method="post" id="myform">
	<table align="center" cellpadding="10" cellspacing="1">
    	<tr bgcolor="#efefef">
   		  <td>Username</td>
            <td><input name="username" type="text" id="username" value="<?php echo $username ?>" /></td>
        </tr>
        <tr bgcolor="#cdcdcd">
        	<td>Password</td>
            <td><input name="password" type="password" id="password" value="<?php echo $password ?>" /></td>
        </tr>
        <tr bgcolor="#efefef">
        	<td>Name</td>
            <td><input name="name" type="text" id="name" value="<?php echo $name ?>" /></td>
        </tr>
        <tr bgcolor="#cdcdcd">
        	<td colspan="2" align="center"><input type="button" value="Edit User" onclick="add_bttn()" /></td>
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
<?php 
	session_start();
 $main_page="Add Staff";
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
<p align="center"><a href="home.php">Home</a> | <a href="manage_staff.php">Back to Staffs</a></p>
<?php

	$firstname=isset($_POST['firstname']) ?  $_POST['firstname'] : ( isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "");
	$my_pix=isset($_POST['my_pix']) ? $_POST['my_pix'] : (isset($_SESSION['my_pix']) ? $_SESSION['my_pix'] : "");
	$lastname=isset($_POST['lastname']) ? $_POST['lastname'] : (isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "");
	$lastname=isset($_POST['position1']) ? $_POST['position1'] : (isset($_SESSION['position1']) ? $_SESSION['position1'] : "");
	$salary=isset($_POST['salary']) ? $_POST['salary'] : (isset($_SESSION['salary']) ? $_SESSION['salary'] : "");
	$allowances=isset($_POST['allowances']) ? $_POST['allowances'] : (isset($_SESSION['allowances']) ? $_SESSION['allowances'] : "");
	$deductions=isset($_POST['deductions']) ? $_POST['deductions'] : (isset($_SESSION['deductions']) ? $_SESSION['deductions'] : "");
	$net_pay=isset($_POST['net_pay']) ? $_POST['net_pay'] : (isset($_SESSION['net_pay']) ? $_SESSION['net_pay'] : "");
?>
<form action="add_staff_process.php" method="post" id="myform">
<table align="center" cellpadding="5" cellspacing="1">
    	<tr bgcolor="#cdcdcd">
        	<td>Firstname</td>
            <td><input name="firstname" type="text" id="firstname" />
        	
        <td>Upload Passport</td>
        	<td><input name="my_pix" type="file" id="my_pix"/></td>
        </tr>
        <tr bgcolor="#efefef">
        	<td>Lastname</td>
            <td><input name="lastname" type="text" id="lastname"/></td>
            
            <td>Position</td>
            <td>
            <select name="position1" id="position1">
            	<option value=""></option>
                <option value="principal">Principal</option>
                <option value="Teacher">Teacher</option>
                <option value="cso">Cso</option>
                <option value="normal_staff">Normal Staff</option>
            </select>
            </td>
        </tr>
        <tr bgcolor="#cdcdcd">
        	<td>Basic Salary</td>
            <td><input name="salary" type="text" id="salary" /></td>
            
          <td>Allowances</td>
          <td><input name="allowances" id="allowances" /></td>         
        </tr>
        <tr bgcolor="#efefef">
        	<td>Deductions</td>
            <td><input name="deductions" type="text" id="deductions" /></td>
            
            <td>Net Pay</td>
            <td><input name="net_pay" type="text" id="net_pay" /></td>
            
        </tr>
        <tr bgcolor="#cdcdcd">
        	<td colspan="4" align="center"><input type="button" value="Add Staff" onclick="add_staff_bttn()" /></td>
        </tr>
    </table>
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
  </form>
    
    <script type="text/javascript">
		document.getElementById("firstname").focus()
		function add_staff_bttn()
		{
			if(document.getElementById("firstname").value=="")
			{
				alert("Please Input Your First Name");
				document.getElementById("firstname").focus()
				return null;
			}
			var i=document.getElementById("my_pix").value;
			if(i=="")
			{
				alert("Please select your picture file");
				return nul;
		 	}
			
		
		
			if(document.getElementById("lastname").value=="")
			{
				alert("Please Input your lastname");
				document.getElementById("lastname").focus();
				return null;
			}
			if(document.getElementById("position1").value=="")
			{
				alert("Please select your position");
				document.getElementById("position1").focus();
				return null;
			}
			
			if(document.getElementById("salary").value=="")
			{
				alert("Please input the Amount For Salary & Plss It has to be a Number");
				document.getElementById("salary").focus();
				return null;
			}
			
			if(isNaN(document.getElementById("salary").value)==true)  
			{			
				alert("Please input the Amount For Salary & Plss It has to be a Number");
				document.getElementById("salary").focus();
				return null;
			}
			
			if(document.getElementById("allowances").value=="")
			{
				alert("Please input the Amount For allowances & Plss It has to be a Number");
				document.getElementById("allowances").focus();
				return null;
			}
			
			if(isNaN(document.getElementById("allowances").value)==true) 
			{
				alert("Please input the Amount For allowances & Plss It has to be a Number");
				document.getElementById("allowances").focus();
				return null;
			}
			
			if(document.getElementById("deductions").value=="")
			{
				alert("Please input the Amount For deductions & Plss It has to be a Number");
				document.getElementById("deductions").focus();
				return null;
			}
			
			if(isNaN(document.getElementById("deductions").value)==true)			
			{
				alert("Please input the Amount For deductions & Plss It has to be a Number");
				document.getElementById("deductions").focus();
				return null;
			}
			
			if(document.getElementById("net_pay").value=="")
			{
				alert("Please input the Amount For net_pay & Plss It has to be a Number");
				document.getElementById("net_pay").focus();
				return null;
			}
			
			if(isNaN(document.getElementById("net_pay").value)==true)			
			{
				alert("Please input the Amount For net_pay & Plss It has to be a Number");
				document.getElementById("net_pay").focus();
				return null;
			}
			document.getElementById("myform").submit()
		}
    </script>
<!-- InstanceEndEditable -->
</div>

</body>
<!-- InstanceEnd --></html>
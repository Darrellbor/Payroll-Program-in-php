<?php
	session_start();
	$main_page="Edit Profile";
	require_once("dbconnect.php");
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
<p align="center"><a href="home.php">Home</a> | <a href="manage_staff.php">Manage Staffs</a></p>

<?php 
	$id=isset($_GET['id']) ? ($_GET['id']) : "";
	$select_rec=mysql_query("select * from staff where (id='$id')");
	if($select_rec==FALSE)
	{
		die("Error encountered Viewing Profile!" .mysql_error());
	}
	$total_rec=mysql_num_rows($select_rec);
	if($total_rec>0)
	{
			mysql_data_seek($select_rec,0);
			$rowp=mysql_fetch_assoc($select_rec);
			
			$firstname=isset($_POST['firstname']) ? $_POST['firstname'] : $rowp['firstname'];
			$my_pix=isset($_POST['my_pix']) ? $_POST['my_pix'] : $rowp['my_pix'];
			$lastname=isset($_POST['lastname']) ? $_POST['lastname'] : $rowp['lastname'];
			$position1=isset($_POST['position1']) ? $_POST['position1'] : $rowp['position1'];
			$salary=isset($_POST['salary']) ? $_POST['salary'] : $rowp['salary'];
			$allowances=isset($_POST['allowances']) ? $_POST['allowances'] : $rowp['allowances'];
			$deductions=isset($_POST['deductions']) ? $_POST['deductions'] : $rowp['deductions'];
			$net_pay=isset($_POST['net_pay']) ? $_POST['net_pay'] : $rowp['net_pay'];
			
	}
?>
<form action="add_staff_process.php" method="post" id="myform">
<table align="center" cellpadding="5" cellspacing="1">
    	<tr bgcolor="#cdcdcd">
        	<td>Firstname</td>
            <td><input name="firstname" type="text" id="firstname" value="<?php echo $firstname ?>" />
        	
        <td>Upload Passport</td>
        	<td><input name="my_pix" type="file" id="my_pix" value="<?php echo $my_pix ?>" /></td>
        </tr>
        <tr bgcolor="#efefef">
        	<td>Lastname</td>
            <td><input name="lastname" type="text" id="lastname" value="<?php echo $lastname ?>"/></td>
            
            <td>Position</td>
            <td>
            <select name="position1" id="position1">
            	<option value=""></option>
                <option value="principal">Principal</option>
                <option value="Teacher">Teacher</option>
                <option value="normal_staff">Normal Staff</option>
            </select>
            </td>
        </tr>
        <tr bgcolor="#cdcdcd">
        	<td>Basic Salary</td>
            <td><input name="salary" type="text" id="salary" value="<?php echo $salary ?>" /></td>
            
          <td>Allowances</td>
          <td><input name="allowances" id="allowances" value="<?php echo $allowances ?>"/></td>         
        </tr>
        <tr bgcolor="#efefef">
        	<td>Deductions</td>
            <td><input name="deductions" type="text" id="deductions" value="<?php echo $deductions ?>"/></td>
            
            <td>Net Pay</td>
            <td><input name="net_pay" type="text" id="net_pay" value="<?php echo $net_pay ?>" /></td>
            
        </tr>
        <tr bgcolor="#cdcdcd">
        	<td colspan="4" align="center"><input type="button" value="Update Staff" onclick="update_staff_bttn()" /></td>
        </tr>
    </table>
  </form>
    
    <script type="text/javascript">
		document.getElementById("firstname").focus();
		function update_staff_bttn()
		{
			if(document.getElementById("firstname").value=="")
			{
				alert("Please Input Your First Name");
				document.getElementById("firstname").focus();
				return null;
			}
			var i=document.getElementById("my_pix").value;
			if(i!="")
			{
				var the_length=i.length;
				var ext=i.substr(the_length-4,4);
				//alert(ext);
				ext=ext.toLowerCase();
				
				if(ext[0]!="." || ext[1]!="j" || ext[2]!="p" || ext[3]!="g")
				{
					alert("This is a '"+ ext +"' file. Please choose a '.jpg' file!");
					return null;
				}
		 	}
			
		
			if(document.getElementById("lastname").value=="")
			{
				alert("Please Input your lastname");
				document.getElementById("lastname").focus();
				return null;
			}
			if(document.getElementById("position").value=="")
			{
				alert("Please select your position");
				document.getElementById("position").focus();
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
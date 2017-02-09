<?php
	session_start();
	$main_page="View Profile";
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
<p align="center"><a href="manage_staff.php">Baxk to Manage Staffs</a></p>

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

<table align="center" cellpadding="5" cellspacing="1" border="0">
	<tr bgcolor="#efefef">
    	<td>Firstname: <?php echo $firstname ?></td>
        
    	<td align="center"><a href="images/<?php echo $rowp['my_pix']; ?>.jpg" target="_blank"><img src="images/<?php echo $rowp['my_pix']; ?>" width="100px" />
        </td>
    </tr>
    <tr bgcolor="#cdcdcd">
    	<td>Lastname: <?php echo $lastname ?></td>
    
    	<td>Position: <?php echo $position1 ?></td>
    </tr>
    <tr bgcolor="#efefef">
    	<td>Basic Salary: <?php echo $salary ?></td>
    
    	<td>Allowances: <?php echo $allowances ?></td>
     </tr>
     <tr bgcolor="#cdcdcd">
        	<td>Deductions: <?php echo $deductions ?></td>
            
            <td>Net Pay: <?php echo $net_pay ?></td>
     </tr>
    
     
</table>

<!-- InstanceEndEditable -->
</div>

</body>
<!-- InstanceEnd --></html>
<?php
	session_start();
	$main_page="Manage Staff";
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
<p align="center"><a href="home.php">Home</a> | <a href="add_staff.php">Add a New Staff</a></p>
<?php
	$select_staff=mysql_query("select * from staff");
	if($select_staff==FALSE)
	{
		?>
        <p class="errormessage">Error encounter accesing staffs Information!! <?php echo mysql_error; ?> </p>
        <?php
		die();
	}
	$total_staff=mysql_num_rows($select_staff);
	if($total_staff<=0)
	{
		?>
        	<p class="errormessage">No Staff Found!!!! </p>
        <?php
	}
	else
	{
		?>
        	<table align="center" cellpadding="5" cellspacing="0" border="0">
            	<tr class="tableheading">
                	
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Position</td>
                    <td>Salary</td>
                    <td>Allowances</td>
                    <td>Deductions</td>
                    <td>Net Pay</td>
                    <td>Delete</td>
                </tr>
                <?php
				$bgcolor="#cdcdcd";
				$sum_sal=0;
				$sum_all=0;
				$sum_ded=0;
				$sum_net=0;
							for($count_staff=0; $count_staff<$total_staff; $count_staff++)
							{
									if($bgcolor=="#cdcdcd")
									{
										$bgcolor="#efefef";
									}
									else
									{
										$bgcolor="#cdcdcd";
									}
						mysql_data_seek($select_staff, $count_staff);
						$row_select_staff=mysql_fetch_assoc($select_staff);
						?>
						<tr bgcolor="<?php echo $bgcolor; ?>">
                        	
 <td><a href="view_profile.php?id=<?php echo $row_select_staff['id']; ?>"><?php echo $row_select_staff['firstname']; ?></a></td>
  <td><a href="edit_profile.php?id=<?php echo $row_select_staff['id']; ?>"><?php echo $row_select_staff['lastname']; ?></a></td>
                            <td><?php echo $row_select_staff['position1']; ?></td>
                            <td><?php echo $row_select_staff['salary']; 
								$sum_sal += $row_select_staff['salary'];
							 ?></td>
                             
                            <td><?php echo $row_select_staff['allowances'];
								$sum_all += $row_select_staff['allowances'];
							 ?></td>
                            
                            <td><?php echo $row_select_staff['deductions'];
							$sum_ded += $row_select_staff['deductions'];
							 ?></td>
                             
                            <td><?php echo $row_select_staff['net_pay'];
							$sum_net += $row_select_staff['net_pay'];
							 ?></td>
                             
                            <td><a href="delete_staff.php?firstname=<?php echo $row_select_staff['firstname'] ?>">Delete</a></td>
                        </tr>
                                            
                        <?php
							}
						?>
                        <tr>
                        	<td>Total:</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td align="right" bgcolor="#99FF66"><?php echo number_format($sum_sal,2); ?></td>
                            <td align="right" bgcolor="#003399"><?php echo number_format($sum_all,2); ?></td>
                            <td align="right" bgcolor="#99FF66"><?php echo number_format($sum_ded,2); ?></td>
                            <td align="right" bgcolor="#003399"><?php echo number_format($sum_net,2); ?></td>
                        </tr>
            </table>
        <?php
	}
?>
<!-- InstanceEndEditable -->
</div>

</body>
<!-- InstanceEnd --></html>
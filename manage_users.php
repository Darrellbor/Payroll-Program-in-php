<?php
	session_start();
	$main_page="Manage Users";
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
<p align="center"><a href="home.php">Home</a> | <a href="add_new_user.php">Add New User</a></p>
	<?php
		$select_users=mysql_query("Select * from users");
		if($select_users==FALSE)
		{
           ?>
           <p class="errormessage">Error encounter accesing user Information! <?php echo mysql_error(); ?></p>
           <?php
            die();
		}
		$total_users=mysql_num_rows($select_users);
		if($total_users<=0)
		{
			?>
            <p class="errormessage">No User Found</p>
            <?php
		}
		else
		{
			?>
<table align="center" cellpadding="5" cellspacing="0" border="0">
                	<tr class="tableheading">
                    	<td>Username</td>
                        <td>Name</td>
                        <td>Delete</td>
                    </tr>
                        <?php
					$bgcolor="#cdcdcd";
						for($count_users=0; $count_users<$total_users; $count_users++)
						{
							if($bgcolor=="#cdcdcd")
							{
								$bgcolor="#efefef";
							}
							else
							{
								$bgcolor="#cdcdcd";
							}
							mysql_data_seek($select_users, $count_users);
							$row_select_users=mysql_fetch_assoc($select_users);
							?>
<tr bgcolor="<?php echo $bgcolor; ?>">
                        <td><a href="edit_user.php ?id=<?php echo $row_select_users['id']; ?>"><?php echo $row_select_users['username']; ?></a></td>
                        <td><?php echo $row_select_users['name']; ?></td>
          <td><a href="delete_user.php?username=<?php echo $row_select_users['username'] ?>">Delete</a></td>
                    </tr>
<?php
						}
				?>
                </table>
            <?php
		}
	?>
<!-- InstanceEndEditable -->
</div>

</body>
<!-- InstanceEnd --></html>
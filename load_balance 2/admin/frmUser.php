<html>
<?php
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
?>
<head>
<title>Admin Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="Desciption" content="This web design site is a very good site with wonderful web design resources">
<meta name="keywords" content="This,web,design,site,is,a,very,good,site,with,wonderful,web,design,resources">
<link href="../style/style.css" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript">
function ConfirmChoice()
	{
		answer = confirm("Do you really want to Logout?")
		if (answer !=0)
		{
			location = "checklogout.php";
		}
	}
</script>	
<body>
<center>
  <div class="wrapper">
    <div class="header">
		<?php
			require "header.php";
		?>
	</div> 
	<div id="nav">
		<ul>
			<li id="current"><a href="javascript:ConfirmChoice()">Logout</a></li>
		</ul>
		<div>
			<a href="#" style="padding-left:40px"><img src="../images/menu1.png"></a>
		</div>
	</div>
    <div style="padding-top:20px;">
		<div id="left-bar">
			<div>&nbsp;</div>
			<div class="stab"><a href="frmAdmin.php" class="ptab">Server Settings</a></div>
			<div class="ntab"><a href="frmUser.php" class="ptab">Users</a></div>
			<div class="stab"><a href="frmUpload.php" class="ptab">Uploads</a></div>
			
		</div>
		<div id="right-bar">
			<div id="nav1">
				<ul class="tabrow">
					<li class="selected"><a href="frmUser.php" class="active1">Registerd USers</a></li>
					<li><a href="frmAddUser.php" class="active1">Add User</a></li>
				</ul>
			</div>
			<div>&nbsp;</div>
			<div style="border:1px solid black;">
			<form id="">
				<table width="100%" cellspacing="0px" cellpadding="5px">
					<tr class="tablehead">
						<td>
							<font color="white"><b>Sr.no.</b></font></td>
						<td>
							<font color="white"><b>Name</b></font></td>
						<td>
							<font color="white"><b>IP Address</b></font></td>
						<td>
							<font color="white"><b>Username</b></font></td>
						<td>
							<font color="white"><b>Update</b></font></td>
						<td>
							<font color="white"><b>Delete</b></font></td>
					</tr>
					<?php
						require "../INCLUDE/database.php";
						$sql = "select * from tbl_user";
						$result = mysql_query($sql);
						if(!$result)
						{
							die('Error - '.mysql_error());
						}
						else
						{
							$i=1;
							while($row = mysql_fetch_array($result))
							{
								echo("
										<tr style=\"text-align:center\"><td><b>".$i."</b></td>
										<td><b>".$row['Name']."</b></td>
										<td><b>".$row['ip']."</b></td>
										<td><b>".$row['Username']."</b></td>
										<td><a href=\"\" style=\"text-decoration:none; color:blue\"><b>Update</b></a></td>
										<td>
										<a href=\"\" style=\"text-decoration:none; color:Red\"><b>Delete</b></a></td></tr>
								");
								$i++;
							}
						}
					?>
				</table>
			</form>
			</div>
		</div>
	</div>
  </div>
</center>
</body>
</html>

<html>
<?php
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
?>
<head>
<title>Admin Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="Desciption" content="This web design site is a very good site with wonderful web design resources">
<meta name="keywords" content="This,web,design,site,is,a,very,good,site,with,wonderful,web,design,resources">
<link href="../style/style.css" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript">
function validate()
{
	var email = document.getElementById('txtname').value;
	var password = document.getElementById('txtpassword').value;
	
	if(email == "")
	{
		document.getElementById('txtname').focus();
		document.getElementById('txtname').placeholder = "Username not provided";
	}
	else if(password == "")
	{
		document.getElementById('txtpassword').focus();
		document.getElementById('txtpassword').placeholder = "Password not provided";
	}
	else
	{
		document.getElementById('admin').submit();
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
		<li><a href="../index.php">Home</a></li>
		<li id="current"><a href="index.php">Admin</a></li>
		<li><a href="../client/index.php">User</a></li>
	</ul>
	<div>
		<a href="#" style="padding-right:110px"><img src="../images/menu1.png"></a>
	</div>
	</div>
	<div>
		<div id="tdiv">
			<form id="admin" action="checklogin.php" method="post">
			<table width="100%" cellpadding="5px" cellspacing="5px">
				<tr><td></td></tr>
				<tr><td colspan="2"></td></tr>
				<tr>
					<td style="text-align: center" colspan="2"><label class="label"><b>Admin Login Panel</b></label></td>
				</tr>
				<tr><td colspan="2" style="text-align: center">
					<label style="color:Yellow"><?php if(isset($_SESSION['err'])){echo $_SESSION['err'];}?></label>
					</td>
				<tr>
					<td width="40%" style="text-align: right"><label class="label">Username <b>:</b></label></td>
					<td width="60%" style="text-align: left;">
					<input type="text" id="txtname" name="txtname" placeholder="Username" autocomplete="off"
					value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?>"/></td>
				</tr>
				<tr>
					<td style="text-align: right"><label class="label">Password <b>:</b></label></td>
					<td style="text-align: left"><input type="password" id="txtpassword" name="txtpassword" placeholder="Password" autocomplete="off" value="<?php if(isset($_SESSION['password'])){echo $_SESSION['password'];}?>"/></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td colspan="2" style="text-align: center">
						<a href="#" class="button" onclick="validate()">Login</a>
					</td>
				</tr>
			</table>
			</form>
		</div>  			
	</div>
  </div>
</center>
</body>
</html>

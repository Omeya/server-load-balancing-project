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
	
function tovalidate()
{
	var name 		= 	document.getElementById('txtname').value;
	var ip			= 	document.getElementById('txtip').value;
	var email 		= 	document.getElementById('txtemail').value;
	var username	=	document.getElementById('txtuname').value;
	var pwd			=	document.getElementById('txtpwd').value;
	var pattern =  /^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/g;
	var mail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	
	if(name == "")
	{
		document.getElementById('txtname').focus();
		document.getElementById('txtname').placeholder = "Please Provide Name";
	}
	else if(ip == "")
	{
		document.getElementById('txtip').focus();
		document.getElementById('txtip').placeholder = "Please Provide IP Address of server";
	}
	else if(!pattern.test(ip))
	{
		document.getElementById('txtip').focus();
		document.getElementById('txtip').value = "";
		document.getElementById('txtip').placeholder = "Please Provide Valid IP Address";
	}
	else if(email == "")
	{
		//alert("hello");
		document.getElementById('txtemail').focus();
		document.getElementById('txtemail').placeholder = "please provide emailid";
	}
	else if(!mail.test(email))
	{
			document.getElementById('txtemail').focus();
			document.getElementById('txtemail').value = "";
			document.getElementById('txtemail').placeholder="Please provide valid email id";
	}
	else if(username == "")
	{
		document.getElementById('txtuname').focus();
		document.getElementById('txtuname').placeholder = "Please Provide Username";
	}
	else if(pwd == "")
	{
		document.getElementById('txtpwd').focus();
		document.getElementById('txtpwd').placeholder = "Please Provide Password";
	}
	else
	{
		document.getElementById('adduser').submit();
		//alert("sdaa");
	}
}

function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
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
					<li><a href="frmUser.php" class="active1">Registerd USers</a></li>
					<li class="selected"><a href="frmAddUser.php" class="active1">Add User</a></li>
				</ul>
			</div>
			<div>
				<form id="adduser" method="post" action="adduser.php">
					<table width="100%" cellspacing="5px" cellpadding="5px">
						<tr><td colspan="3"></td></tr>
						<tr>
						<td colspan="3" style="text-align: center">
						<label style="color:red">
							<?php if(isset($_SESSION['addusererror'])){echo $_SESSION['addusererror'];}?>
						</label>
						</td>
						</tr>
						<tr>
							<td width="30%" colspan ="3" rowspan="8">
								<img src="../images/client1.png" width="100%"/>
							</td>
						</tr>
						<tr>
							<td style="text-align:right">
								<label class="label1">Name <font color="Red">*</font><b> :</b></label>
							</td>
							<td style="text-align:left">
								<input type="text" class="input" name="txtname" id="txtname" style="width:200px" 
								placeholder="Name" autocomplete="off"
								value="<?php if(isset($_SESSION['uname'])){echo $_SESSION['uname'];}?>"/>
							</td>
						</tr>
						<tr>
							<td width="20%" style="text-align:right">
								<label class="label1">IP Address <font color="Red">*</font><b> :</b></label>
							</td>
							<td style="text-align:left">
								<input type="text" class="input" name="txtip" id="txtip" style="width:200px" 
								placeholder="IP Address" autocomplete="off"
								value="<?php if(isset($_SESSION['ipu'])){echo $_SESSION['ipu'];}?>"/>
							</td>
						</tr>
						<tr>
							<td width="20%" style="text-align:right">
								<label class="label1">Email ID <font color="Red">*</font><b> :</b></label>
							</td>
							<td style="text-align:left">
								<input type="text" name="txtemail" id="txtemail" style="width:200px" 
								placeholder="Email id" autocomplete="off" 
								value="<?php if(isset($_SESSION['emailid'])){echo $_SESSION['emailid'];}?>"/>
							</td>
						</tr>
						<tr>
							<td width="20%" style="text-align:right">
								<label class="label1">Username <font color="Red">*</font><b> :</b></label>
							</td>
							<td style="text-align:left">
								<input type="text" name="txtuname" id="txtuname" style="width:200px" 
								placeholder="Username" autocomplete="off" 
								value="<?php if(isset($_SESSION['usernm'])){echo $_SESSION['usernm'];}?>"/>
							</td>
						</tr>
						<tr>
							<td width="20%" style="text-align:right">
								<label class="label1">Password <font color="Red">*</font><b> :</b></label>
							</td>
							<td style="text-align:left">
								<input type="password" name="txtpwd" id="txtpwd" style="width:200px" 
								placeholder="Password" autocomplete="off" 
								value="<?php if(isset($_SESSION['pwd'])){echo $_SESSION['pwd'];}?>"/>
							</td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<a href="#" class="button" onclick="tovalidate()">Add</a>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
  </div>
</center>
</body>
</html>

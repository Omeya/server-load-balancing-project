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
	var server = document.getElementById('txtserver').value;
	var ip = document.getElementById('txtip').value;
	var bucket = document.getElementById('txtbucket').value;
	var pattern = /^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/g;
	
	if(server == "")
	{
		document.getElementById('txtserver').focus();
		document.getElementById('txtserver').placeholder = "Please Provide Name of Server";
	}
	else if(ip == "")
	{
		document.getElementById('txtip').focus();
		document.getElementById('txtip').placeholder = "Please Provide IP Address of server";
	}
	else if(!pattern.test(ip))
	{
		document.getElementById('txtip').value = "";
		document.getElementById('txtip').focus();
		document.getElementById('txtip').placeholder = "Please Provide Valid IP Address";
	}
	else if(bucket == "")
	{
		document.getElementById('txtbucket').focus();
		document.getElementById('txtbucket').placeholder = "Please Provide Bucket Bandwidth of server";
	}
	else
	{
		document.getElementById('addserver').submit();
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
			<div class="ntab"><a href="frmAdmin.php" class="ptab">Server Settings</a></div>
			<div class="stab"><a href="frmUser.php" class="ptab">Users</a></div>
			<div class="stab"><a href="frmUpload.php" class="ptab">Uploads</a></div>
			
		</div>
		<div id="right-bar">
			<div id="nav1">
				<ul class="tabrow">
					<li><a href="frmAdmin.php" class="active1">Server List</a></li>
					<li class="selected"><a href="frmAddServer.php" class="active1">Add Server</a></li>
					<li><a href="#" class="active1">Server Statistics</a></li>
					<li><a href="#" class="active1">Total Download</a></li>
				</ul>
			</div>
			<div>
				<form id="addserver" method="post" action="addserver.php">
					<table width="100%" cellspacing="5px" cellpadding="5px">
						<tr><td></td></tr>
						<tr>
						<td colspan="2" style="text-align: center">
						<label style="color:red"><?php if(isset($_SESSION['error'])){echo $_SESSION['error'];}?>
						</label>
						</td>
						</tr>
						<tr>
							<td width="30%" style="text-align:right">
								<label class="label1">Server Name <font color="Red">*</font><b> :</b></label>
							</td>
							<td style="text-align:left">
								<input type="text" class="input" name="txtserver" id="txtserver" style="width:200px" 
								placeholder="Server Name" autocomplete="off"
								value="<?php if(isset($_SESSION['servername'])){echo $_SESSION['servername'];}?>"/>
							</td>
						</tr>
							<tr>
							<td width="20%" style="text-align:right">
								<label class="label1">IP Address <font color="Red">*</font><b> :</b></label>
							</td>
							<td style="text-align:left">
								<input type="text" class="input" name="txtip" id="txtip" style="width:200px" 
								placeholder="IP Address" autocomplete="off"
								value="<?php if(isset($_SESSION['ip'])){echo $_SESSION['ip'];}?>"/>
							</td>
						</tr>
							<tr>
							<td width="20%" style="text-align:right">
								<label class="label1">Bandwidth of Bucket <font color="Red">*</font><b> :</b></label>
							</td>
							<td style="text-align:left">
								<input type="text" onkeypress="return isNumberKey(event)" name="txtbucket" 
								id="txtbucket" style="width:200px" placeholder="Bandwidth" autocomplete="off" 
								value="<?php if(isset($_SESSION['bandwidth'])){echo $_SESSION['bandwidth'];}?>"/>
								<label class="label1">Kbps</label>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
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

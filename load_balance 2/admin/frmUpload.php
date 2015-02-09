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

	function gettable(str)
	{	
		if (str=="")
		{
			document.getElementById("contenttable").innerHTML="";
			return;
		} 
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("contenttable").innerHTML=xmlhttp.responseText;
			}
		}
	xmlhttp.open("GET","gettable.php?id="+str,true);
	xmlhttp.send();
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
			<div class="stab"><a href="frmUser.php" class="ptab">Users</a></div>
			<div class="ntab"><a href="frmUpload.php" class="ptab">Uploads</a></div>
			
		</div>
		<div id="right-bar">
			<div id="nav1">
				<ul class="tabrow">
					<li class="selected"><a href="frmList.php" class="active1">Uploaded Files</a></li>
					<li><a href="frmVideo.php" class="active1">Video</a></li>
					<li><a href="frmAudio.php" class="active1">Audio</a></li>
					<li><a href="frmFile.php" class="active1">File</a></li>
				</ul>
				<div style="padding-top:20px;">
					<table style="cellspacing:5px; width:100%">
					<tr style="text-align:center">
						<td>
						<select style="width:200px; height:28px" id="ddlcategory" name="ddlcategory" 
								onchange="gettable(this.value);">
							<option value="0">---Select Category---</option>
							<option value="1">Videos</option>
							<option value="2">Audios</option>
							<option value="3">Files</option>
						</select>
						</td>
					</tr>
					</table>
				</div>
			</div>
			<div>&nbsp;</div>
				<?php
					require "gettable.php";
				?>
		</div>
	</div>
  </div>
</center>
</body>
</html>

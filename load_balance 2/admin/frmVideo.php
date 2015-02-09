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
	var doc = document.getElementById('uploadFile').value;
	
	if(doc == "")
	{
		document.getElementById('uploadFile').focus();
		alert("Please select video to upload");
	}
	else
	{
		document.getElementById('addvideo').submit();
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
			<div class="stab"><a href="frmUser.php" class="ptab">Users</a></div>
			<div class="ntab"><a href="frmUpload.php" class="ptab">Uploads</a></div>
			
		</div>
		<div id="right-bar">
			<div id="nav1">
				<ul class="tabrow">
					<li><a href="frmList.php" class="active1">Uploaded Files</a></li>
					<li class="selected"><a href="frmVideo.php" class="active1">Video</a></li>
					<li><a href="frmAudio.php" class="active1">Audio</a></li>
					<li><a href="frmFile.php" class="active1">File</a></li>
				</ul>
			</div>
			<div>
				<form id="addvideo" method="post" action="uploadvideo.php" enctype="multipart/form-data">
					<table width="100%" cellspacing="5px" cellpadding="5px">
						<tr><td></td></tr>
						<tr>
						<td colspan="2" style="text-align: center">
						<label style="color:red">
						<?php if(isset($_SESSION['videoerror'])){echo $_SESSION['videoerror'];}?>
						</label>
						</td>
						</tr>
						<tr>
							<td style="text-align: right" width="30%">Upload Video File 
							<span class="asterik">*</span> <b>:</b></td>
							<td style="text-align: left" width="50%">
							<input type="file" name="uploadFile" id="uploadFile">.mpeg/.avi/.flv/.mov
							<br/>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<a href="#" class="button" onclick="tovalidate()">Upload</a>
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

<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require "../INCLUDE/database.php";
	session_start();
	
	$server 	= 	$_SESSION['servername']		=	mysql_real_escape_string(trim($_POST['txtserver']));
	$ip			=	$_SESSION['ip']			=	mysql_real_escape_string(trim($_POST['txtip']));
	$bandwidth	=	$_SESSION['bandwidth']	=	mysql_real_escape_string(trim($_POST['txtbucket']));
	
	if(($server == "") || ($ip == "") || ($bandwidth == ""))
	{
		$_SESSION['error'] = "Please Provide all Strings";
		header('location:frmAddServer.php');
	}
	else
	{
		$sql = "select * from tbl_server where server = '$server'";
		$result = mysql_query($sql);
		if(!$result)
		{
			die('Error - '.mysql_error());
		}
		else
		{
			if(mysql_num_rows($result) > 0)
			{
				$_SESSION['error'] = "Server Already Exists into Database";
				header('location:frmAddServer.php');
			}
			else
			{
				$bandwidth = $bandwidth." "."kbps";
				$sql1 = "insert into tbl_server(server,ip,bandwidth)values('$server','$ip','$bandwidth')";
				$result1 = mysql_query($sql1);
				if(!$result1)
				{
					die('Error - '.mysql_error());
				}
				else
				{
					unset($_SESSION['servername']);
					unset($_SESSION['ip']);
					unset($_SESSION['bandwidth']);
					unset($_SESSION['error']);
					header('location:frmAdmin.php');
				}
			}
		}
	}
?>
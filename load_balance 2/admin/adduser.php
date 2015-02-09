<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require "../INCLUDE/database.php";
	session_start();
	
	$name	 	= 	$_SESSION['uname']		=	mysql_real_escape_string(trim($_POST['txtname']));
	$ip			=	$_SESSION['ipu']		=	mysql_real_escape_string(trim($_POST['txtip']));
	$email		=	$_SESSION['emailid']	=	mysql_real_escape_string(trim($_POST['txtemail']));
	$uname		=	$_SESSION['usernm']		=	mysql_real_escape_string(trim($_POST['txtuname']));
	$pwd		=	$_SESSION['pwd']		=	mysql_real_escape_string(trim($_POST['txtpwd']));
	
	if(($name == "") || ($ip == "") || ($email == "") || ($uname == "") || ($pwd == ""))
	{
		$_SESSION['addusererror'] = "Please Provide all Strings";
		header('location:frmAddUser.php');
	}
	else
	{
		$sql = "select * from tbl_user where username = '$uname' and password = '$pwd'";
		$result = mysql_query($sql);
		if(!$result)
		{
			die('Error - '.mysql_error());
		}
		else
		{
			if(mysql_num_rows($result) > 0)
			{
				$_SESSION['addusererror'] = "Username Already in Use";
				header('location:frmAddUser.php');
			}
			else
			{
				$sql1 = "insert into tbl_user(Name,ip,Emailid,Username,Password)
						values('$name','$ip','$email','$uname','$pwd')";
				$result1 = mysql_query($sql1);
				if(!$result1)
				{
					die('Error - '.mysql_error());
				}
				else
				{
					unset($_SESSION['uname']);
					unset($_SESSION['ipu']);
					unset($_SESSION['emailid']);
					unset($_SESSION['usernm']);
					unset($_SESSION['pwd']);
					unset($_SESSION['addusererror']);
					header('location:frmAddUser.php');
				}
			}
		}
	}
?>
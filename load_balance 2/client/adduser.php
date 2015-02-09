<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require "../INCLUDE/database.php";
	session_start();
	
	$name	 	= 	$_SESSION['cuname']		=	mysql_real_escape_string(trim($_POST['txtname']));
	$ip			=	$_SESSION['cipu']		=	mysql_real_escape_string(trim($_POST['txtip']));
	$email		=	$_SESSION['cemailid']	=	mysql_real_escape_string(trim($_POST['txtemail']));
	$uname		=	$_SESSION['cusernm']	=	mysql_real_escape_string(trim($_POST['txtuname']));
	$pwd		=	$_SESSION['cpwd']		=	mysql_real_escape_string(trim($_POST['txtpwd']));
	
	if(($name == "") || ($ip == "") || ($email == "") || ($uname == "") || ($pwd == ""))
	{
		$_SESSION['addclienterror'] = "Please Provide all Strings";
		header('location:frmregistration.php');
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
				$_SESSION['addclienterror'] = "Username Already in Use";
				header('location:frmregistration.php');
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
					unset($_SESSION['cuname']);
					unset($_SESSION['cipu']);
					unset($_SESSION['cemailid']);
					unset($_SESSION['cusernm']);
					unset($_SESSION['cpwd']);
					unset($_SESSION['addclienterror']);
					header('location:registration.php');
				}
			}
		}
	}
?>
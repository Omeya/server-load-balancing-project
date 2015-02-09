<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
require"../INCLUDE/database.php";

$username = $_SESSION['username'] =	$_POST['txtname'];
$password = $_SESSION['password'] = $_POST['txtpassword'];
/*
echo $username;
echo $password;
*/
/*$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
*/
if(($username == "") || ($password == ""))
{
	$_SESSION['err']='Please provide login details';
	header('location:index.php');
}
else
{
	$sql = "select id,name from tbl_admin where name = '$username' and password='$password'";
	$result = mysql_query($sql);
	if(!$result)
	{
		die('error - '.mysql_error());
	}	
	else
	{
		//echo mysql_num_rows($result);
		if(mysql_num_rows($result)>0)
		{
			//session_start();
			while($row=mysql_fetch_array($result))
			{
				$_SESSION['id'] = $row['id'];
				$_SESSION['name'] = $row['name'];
				unset($_SESSION['username']);
				unset($_SESSION['password']);
				unset($_SESSION['err']);
				header('location:frmAdmin.php');
			}
		}
		else
		{
			//echo "hello";
			
			$_SESSION['err'] = "Incorrect Login Details";
			header('location:index.php');
		}
	}
}
?>
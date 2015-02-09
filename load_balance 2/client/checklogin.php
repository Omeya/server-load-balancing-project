<?php
	error_reporting(E_ALL ^ E_NOTICE);
	require "../INCLUDE/database.php";
	session_start();
	
	echo $name 		= 	$_SESSION['susername'] 	= 	mysql_real_escape_string(trim($_POST['txtname']));
	echo $password 	= 	$_SESSION['spassword']	=	mysql_real_escape_string(trim($_POST['txtpassword']));
	
	if(($name == "") || ($password == ""))
	{
		$_SESSION['studenterr'] = "Please provide all Strings";
		header('location:index.php');
	}
	else
	{
		echo $sql = "select * from tbl_user where Username = '$name' and Password = '$password'";
		$result = mysql_query($sql);
		if(!$result)
		{
			die('Error - '.mysql_error());
		}
		else
		{
			$count = mysql_num_rows($result);
			if($count == 1)
			{
				while($row = mysql_fetch_array($result))
				{
					$_SESSION['id'] 	= 	$row['id'];
					$_SESSION['NAME'] 	=	 $row['Name'];
					unset($_SESSION['studenterr']);
					unset($_SESSION['susername']);
					unset($_SESSION['spassword']);
					header('location:frmClient.php');
				}
			}
			else
			{
				$_SESSION['studenterr'] = "Unauthorised Person";
				header('location:index.php');
			}
		}
	}
?>
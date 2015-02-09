<?php
error_reporting(E_ALL ^ E_NOTICE);
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "dbo_loadbalance";
	
	$conn =  mysql_connect($server,$username,$password) or die('Server Information is not Correct'); //Establish Connection with Server
	mysql_select_db($database,$conn) or die('Database Information is not correct');
?>
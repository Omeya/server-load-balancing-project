<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
require "../INCLUDE/database.php";

echo $filename 	=	$_SESSION['filename']	=	 basename($_FILES['userfile']['name']);
/*$findme = '.mp3';
$pos = strpos($filename , $findme);

if($pos == false)
{
		$_SESSION['audioerror'] = "Unknownn extension";
		header('location:frmAudio.php');
}
else {
	*/
	$uploaddir = 'files/'; // Relative path under webroot
	$filename = basename($_FILES['userfile']['name']);
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
	{
		$sql1 = "select id from tbl_files where file = '$filename'";
		$result1 = mysql_query($sql1);
		if(!$result1)
		{
			die('error - '.mysql_error());
		}
		else {
		if(mysql_num_rows($result1) > 0)
		{
			$_SESSION['fileerror']="File Already Uploaded";
			header('location:frmFile.php');
		}
		else {
			$sql = "insert into tbl_files(file) values ('$filename')";
			$result = mysql_query($sql);
			if(!$result)
			{
				die('error - '.mysql_error());
			}
			else {
				unset($_SESSION['fileerror']);
				header('location:frmUpload.php');
				}
			} 
		}
	}
?>
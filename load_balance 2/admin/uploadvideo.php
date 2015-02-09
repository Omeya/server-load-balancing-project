<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
require "../INCLUDE/database.php";

$filename 	=	$_SESSION['filename']	=	 basename($_FILES['uploadFile']['name']);
$chk_ext = explode(".",$filename);
$ext = strtolower($chk_ext[1]);
//if($ext != "zip")

if(($ext != "mpeg") && ($ext != "avi") && ($ext != "flv") && ($ext != "mov"))
{
	$_SESSION['videoerror'] = "Unknownn extension";
	header('location:frmVideo.php');
}
else {

	$uploaddir = 'http://192.168.0.103/c/videos/'; // Relative path under webroot
	$filename = basename($_FILES['uploadFile']['name']);
	$uploadfile = $uploaddir . basename($_FILES['uploadFile']['name']);
	if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $uploadfile)) 
	{
		$sql1 = "select id from tbl_video where video = '$filename'";
		$result1 = mysql_query($sql1);
		if(!$result1)
		{
			die('error - '.mysql_error());
		}
		else {
		if(mysql_num_rows($result1) > 0)
		{
			$_SESSION['videoerror']="Video Already Uploaded";
			header('location:frmVideo.php');
		}
		else {
			$sql = "insert into tbl_video (video) values ('$filename')";
			$result = mysql_query($sql);
			if(!$result)
			{
				die('error - '.mysql_error());
			}
			else {
				unset($_SESSION['videoerror']);
				header('location:frmUpload.php');
				}
			} 
		}
	}
}
?>
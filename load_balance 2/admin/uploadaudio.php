<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
require "../INCLUDE/database.php";

		/*$file = 'C:\Documents and Settings\ibndotnet\Desktop\songs\Mohara\mohra3(songs.pk).mp3';
		$remote_file = 'C:\wamp\www\logs\mohra3(songs.pk).mp3';*/
		$myFile = $_FILES['userfile']; // This will make an array out of the file information that was stored.
		$file = $myFile['tmp_name'];  //Converts the array into a new string containing the path name on the server where your file is.
 
      $myFileName = basename($_FILES['userfile']['name']); //Retrieve filename out of file path

      $destination_file = "/".$myFileName;  //where you want to throw the file on the webserver (relative to your login dir)
      // connection settings
      $ftp_server = "127.0.0.1";  //address of ftp server.
      $ftp_user_name = "server1"; // Username
      $ftp_user_pass = "server1";   // Password

      $conn_id = ftp_connect($ftp_server);        // set up basic connection
	 
      $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass) or die("<h2>You do not have access to this ftp server!</h2>");   // login with username and password, or give invalid user message
		ftp_pasv ( $conn_id, true );
	 if ((!$conn_id) || (!$login_result)) {  // check connection
             // wont ever hit this, b/c of the die call on ftp_login
             echo "FTP connection has failed! <br />";
             echo "Attempted to connect to $ftp_server for user $ftp_user_name";
             exit;
         } else {
         //    echo "Connected to $ftp_server, for user $ftp_user_name <br />";
      }

      $upload = ftp_put($conn_id, $destination_file, $file, FTP_BINARY);  // upload the file
      if (!$upload) {  // check upload status
         echo "<h2>FTP upload of $myFileName has failed!</h2> <br />";
      } else {
         echo "Uploading $myFileName Complete!<br /><br />";
      }

      ftp_close($conn_id); // close

/*
$filename 	=	$_SESSION['filename']	=	 basename($_FILES['userfile']['name']);
$findme 	= 	'.mp3';
$pos 		= 	strpos($filename , $findme);
echo $destination_file = "C:\\wamp\\www\\logs\\".basename($_FILES['userfile']['name']);
$myfile_replace = str_replace('\\', '/', $destination_file);
$ftp_server = "127.0.0.1";      // FTP Server Address (exlucde ftp://)
$ftp_user_name = "server1";     // FTP Server Username
$ftp_user_pass = "server1";      // Password

    // Connect to FTP Server
    $conn_id = ftp_connect($ftp_server);
    // Login to FTP Server
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
    
    // Verify Log In Status
    if ((!$conn_id) || (!$login_result)) {
        echo "FTP connection has failed! <br />";
        echo "Attempted to connect to $ftp_server for user $ftp_user_name";
        exit;
    } else {
        echo "Connected to $ftp_server, for user $ftp_user_name <br />";
    }

	echo $upload = ftp_put($conn_id, $destination_file, $filename, FTP_BINARY);  // Upload the File
    // Verify Upload Status
    if (!$upload) {
        echo "<h2>FTP upload of ".$_FILES['userfile']['name']." has failed!</h2><br /><br />";
    } else {
        echo "Success!<br />" . $_FILES['userfile']['name'] . " has been uploaded to " . $ftp_server . $destination_file . "!<br /><br />";
    }

    ftp_close($conn_id); // Close the FTP Connection
/*
if($pos == false)
{
		$_SESSION['audioerror'] = "Unknownn extension";
		header('location:frmAudio.php');
}
else {
	
	//header('location:http://192.168.0.107:2323');
	
	$uploaddir = 'audios/'; // Relative path under webroot
	$filename = basename($_FILES['userfile']['name']);
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
	{
		$sql1 = "select id from tbl_audio where audios = '$filename'";
		$result1 = mysql_query($sql1);
		if(!$result1)
		{
			die('error - '.mysql_error());
		}
		else {
		if(mysql_num_rows($result1) > 0)
		{
			$_SESSION['audioerror']="audio Already Uploaded";
			header('location:frmAudio.php');
		}
		else {
			$sql = "insert into tbl_audio(audios) values ('$filename')";
			$result = mysql_query($sql);
			if(!$result)
			{
				die('error - '.mysql_error());
			}
			else {
				unset($_SESSION['audioerror']);
				//header('location:frmUpload1.aspx');
				header('location:frmUpload.php');
				}
			} 
		}
	}
}*/
?>
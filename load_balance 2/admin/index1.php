<?php

$ftp_server = "192.168.0.104";
$ftp_user_name = "";
$ftp_user_pass = "";
/*$destination_file = "C:\\wamp\\www\\projects\\upload_file \\".$_FILES['userfile']['name'];
echo $sourcefile = basename($_FILES['userfile']['name']);*/
//$filename 	=	$_SESSION['filename']	=	 basename($_FILES['userfile']['name']);
// set up basic connection
$conn_id = ftp_connect($ftp_server); 

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 

// check connection
if ((!$conn_id) || (!$login_result)) { 
echo "FTP connection has failed!";
echo "Attempted to connect to $ftp_server for user $ftp_user_name"; 
exit; 
} else {
echo "Connected to $ftp_server, for user $ftp_user_name";
}
		/*
		# Step 6
		// *** Define your host, username, and password
		define('FTP_HOST', '192.168.0.104');
		define('FTP_USER', 'root');
		define('FTP_PASS', '');
		/*define('FTP_USER', 'Blimpf');
		define('FTP_PASS', 'catfish');*/


		// *** Include the class
		/*include('ftp_class.php');

		// *** Create the FTP object
		$ftpObj = new FTPClient();


		// *** Connect
		if ($ftpObj -> connect(FTP_HOST, FTP_USER, FTP_PASS)) {

			
			## --------------------------------------------------------
			
			# Step 7

			$dir = 'httpdocs/photos';		
			
			// *** Make directory
			$ftpObj->makeDir($dir);

			print_r($ftpObj -> getMessages());

			## --------------------------------------------------------
			
			# Step 8

			$fileFrom = 'zoe.jpg';				
			$fileTo = $dir . '/' . $fileFrom;
		
			// *** Upload local file to new directory on server
			$ftpObj -> uploadFile($fileFrom, $fileTo);

			print_r($ftpObj -> getMessages());

			## --------------------------------------------------------
							
			# Step 9
	
			// *** Change to folder
			$ftpObj->changeDir($dir);

			// *** Get folder contents
			$contentsArray = $ftpObj->getDirListing();


			// *** Output our array of folder contents
			echo '<pre>';
			print_r($contentsArray);
			echo '</pre>';

			## --------------------------------------------------------
			
			# Step 10
			
			$fileFrom = 'zoe.jpg';		# The location on the server
			$fileTo = 'zoe-new.jpg';			# Local dir to save to

			// *** Download file
			$ftpObj->downloadFile($fileFrom, $fileTo);

		} */
?>

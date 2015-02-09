<?php
echo $uploadfile = $_GET['file'];
$ch = curl_init ($uploadfile);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);

$rawdata = curl_exec($ch);

// Check if any error occured

if(curl_errno($ch))

{

  $fp = fopen("http://192.168.0.115/load_balance/admin/audio", 'w');

  fwrite($fp, $rawdata);

  fclose($fp);

}

curl_close ($ch);

ob_flush();

flush();

?>
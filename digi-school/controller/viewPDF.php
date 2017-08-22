<?php
$category = $_GET['category'];
$fileName = $_GET['fileName'];
$link = "http://digischool.blob.core.windows.net/".$category."/".$fileName;
header("Content-Length: " . filesize ($link) ); 
header("Content-type: application/pdf"); 
header("Content-disposition: inline;     
filename=".basename($fileName));
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
$filepath = readfile($link);
?>
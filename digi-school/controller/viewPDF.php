<?php
header("Content-Length: " . filesize ('http://digischool.blob.core.windows.net/android/AD2.pdf') ); 
header("Content-type: application/pdf"); 
header("Content-disposition: inline;     
filename=".basename('AD2'));
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
$filepath = readfile('http://digischool.blob.core.windows.net/android/AD2.pdf');
?>
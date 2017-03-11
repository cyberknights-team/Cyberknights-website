<?php
header("Content-Length: " . filesize ('android_intern.pdf') ); 
header("Content-type: application/pdf"); 
header("Content-disposition: inline;     
filename=".basename('android_intern.pdf'));
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
$filepath = readfile('android_intern.pdf');
?>
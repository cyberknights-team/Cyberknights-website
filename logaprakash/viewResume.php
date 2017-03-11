<?php
header("Content-Length: " . filesize ('Logaprakash Raju Resume 2017.pdf') ); 
header("Content-type: application/pdf"); 
header("Content-disposition: inline;     
filename=".basename('Logaprakash Raju Resume 2017.pdf'));
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
$filepath = readfile('Logaprakash Raju Resume 2017.pdf');
?>
<?php
$container = $_GET['container'];
$file = $_GET['file'];

$file_url = 'http://digischool04.blob.core.windows.net/' .$container.'/'. $file;
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"".$file."\""); 
readfile($file_url);
exit;
?>


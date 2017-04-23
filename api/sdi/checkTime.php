<?php
$parameter = $_GET['parameter'];
$parts = explode('-',$parameter);
date_default_timezone_set('Asia/Kolkata');
$date = date('d/m/Y');
$hour = date('h');
$min = date('i');
$dec = 1;
if(strcmp($date,$parts[0]) == 0){
$date = date('d/m/Y', strtotime(' + 1 day')); 
if($parts[1]-$hour<0){
	echo $date." ".$hour." ".$min;
}
else if($parts[1]-$hour==0){
	if($parts[2]-$min<=0){
		echo $date."-".$parts[1]."-".$parts[2];
	}
	else
		$dec = 0;
}
else
$dec = 0;
}
else
$dec = 0;

if($dec == 0)
	echo "false";


?>
<?php

include 'config.php';
include 'getAllEvents.php';
session_start();
$username = $_SESSION['username'];
$event = $_POST['event'];
$access = $_POST['access'];
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d h:i:sa");

foreach($entities as $entity){
	if($entity->getPartitionKey()==$event){
		if($entity->getProperty("AccessCode")->getValue()!=$access){
			$msg = "Access Denied !!!";
			header("Location:../welcome.php?div=presence&result=".$msg."");
		}	
		else{
			require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;
use MicrosoftAzure\Storage\Table\Models\Entity;
use MicrosoftAzure\Storage\Table\Models\EdmType;

// Create table REST proxy.
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

$entity = new Entity();
$entity->setPartitionKey($event);
$entity->setRowKey($username);
$entity->addProperty("date", null,$event);

try{
    $tableRestProxy->insertEntity("presence", $entity);
	header("Location:../welcome.php?div=presence&result=y");
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179438.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
	$msg = "You have been already marked your presence for this event";
	header("Location:../welcome.php?div=presence&result=".$msg."");
}
		}
	}
}





?>
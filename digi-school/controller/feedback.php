<?php

include 'config.php';
session_start();
$username = $_SESSION['username'];
$event = $_GET['event'];
$feedback = $_GET['feedback'];
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d h:i:sa");

require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;
use MicrosoftAzure\Storage\Table\Models\Entity;
use MicrosoftAzure\Storage\Table\Models\EdmType;

// Create table REST proxy.
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

$entity = new Entity();
$entity->setPartitionKey($username);
$entity->setRowKey($date);
$entity->addProperty("event", null,$event);
$entity->addProperty("feedback", null,$event);

try{
    $tableRestProxy->insertEntity("feedback", $entity);
	header("Location:../welcome.php?div=feedback&result=y");
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179438.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
}

?>
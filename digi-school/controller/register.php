<?php

include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;
use MicrosoftAzure\Storage\Table\Models\Entity;
use MicrosoftAzure\Storage\Table\Models\EdmType;

// Create table REST proxy.
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

$entity = new Entity();
$entity->setPartitionKey($username);
$entity->setRowKey($password);
$entity->addProperty("role", null,$role);

try{
    $tableRestProxy->insertEntity("users", $entity);
	header("Location:../welcome.php?div=addUser&result=y");
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179438.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
}

?>
<?php

include 'config.php';

require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;

// Create table REST proxy.
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

try    {
    $result = $tableRestProxy->getEntity("rovers", "public", $_GET['id']);
	$entity = $result->getEntity();
$output = array($entity->getProperty("auth")->getValue(),$entity->getProperty("password")->getValue());
header('Content-Type: application/json');
echo json_encode($output);
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179438.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
	header('Content-Type: application/json');
    echo "false";
}




?>
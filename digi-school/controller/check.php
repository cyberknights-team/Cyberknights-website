<?php

include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;

// Create table REST proxy.
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

try    {
    $result = $tableRestProxy->getEntity("users", $username, $password);
}
catch(ServiceException $e){
	header("Location: ../");
	
}

$entity = $result->getEntity();

session_start();
$_SESSION['username'] = $entity->getPartitionKey();
if($entity->getProperty("role")->getValue()=="admin"){
	$_SESSION['admin'] = "auth";
}
header("Location: ../welcome.php");

?>
<?php
include 'config.php';
require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;

// Create table REST proxy.
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);


try    {
    $result = $tableRestProxy->queryEntities("feedback");
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179438.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}

$entities = $result->getEntities();

	foreach($entities as $entity){
	if($entity->getPartitionKey()==$_POST['partition'] && $entity->getRowKey()==$_POST['rowkey']){


// Create table REST proxy.
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

try    {
	
    // Delete entity.
    $tableRestProxy->deleteEntity("feedback", $entity->getPartitionKey() ,$entity->getRowKey());
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179438.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}
	}
}

header("Location:../welcome.php?div=showFeedbacks&result=y");
	
?>
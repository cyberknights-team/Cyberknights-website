<?php

include 'config.php';

require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;
use MicrosoftAzure\Storage\Table\Models\Entity;
use MicrosoftAzure\Storage\Table\Models\EdmType;

// Create table REST proxy.
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

$result = $tableRestProxy->getEntity("events", $_POST['partition'], $_POST['rowKey']);

$entity = $result->getEntity();

$entity->setPropertyValue("ParitionKey", $_POST['eventCode']);

$entity->setPropertyValue("RowKey", $_POST['date']);

$entity->setPropertyValue("AccessCode", $_POST['accessCode']);

$entity->setPropertyValue("EventName", $_POST['EventName']);

$entity->setPropertyValue("EventPlace", $_POST['EventPlace']);

try    {
    $tableRestProxy->updateEntity("events", $entity);
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179438.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}

header("Location: ../welcome.php?div=showEvents&result=y");

?>
<?php

include 'config.php';
     $fileName = $_FILES["file"]["name"];
	 $category = $_POST['category'];
	 $contains = $_POST['contains'];

require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;
use MicrosoftAzure\Storage\Table\Models\Entity;
use MicrosoftAzure\Storage\Table\Models\EdmType;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;

$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
$createContainerOptions = new CreateContainerOptions();
$createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);


try{
    $blobRestProxy->createContainer($category, $createContainerOptions);
}
catch(ServiceException $e){}


$content = fopen($_FILES["file"]["tmp_name"], "r");
$blob_name = $fileName;

try    {
    //Upload blob
    $blobRestProxy->createBlockBlob($category, $blob_name,$content );
	// Create table REST proxy.
$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);

$entity = new Entity();
$entity->setPartitionKey($category);
$entity->setRowKey($fileName);
$entity->addProperty("Contains", null,$contains);
$size = (String)(intval($_FILES["file"]["size"]/1024));
$entity->addProperty("Size", null,$size."kb");
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d h:i:sa");
$entity->addProperty("Date", null,$date);
try{
    $tableRestProxy->insertEntity("software", $entity);
	header("Location:../welcome.php?div=upload&result=softwarey"); 
}
catch(ServiceException $e){
    $code = $e->getCode();
    $error_message = $e->getMessage();
}
}
catch(ServiceException $e){
	$code = $e->getCode();
    $error_message = $e->getMessage(); 
}
	 	
  
?>
<?php
include ('../services/Store_services.php');

$service = new StoreServices();
echo json_encode(array("stores"=> $service->getAll()));
?>
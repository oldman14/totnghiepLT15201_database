<?php
include ('../services/ListProduct_service.php');
$services = new ListProductService();

$store = $_POST['storeID'];
$response = array(); 
$response['ListProduct'] = $services->getListProductOneStore($store); 
$response['TypeProduct'] = $services->getAllType();
echo json_encode($response);

?> 
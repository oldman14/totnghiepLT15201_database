<?php
include ('../services/ListProduct_service.php');
$services = new ListProductService();
$store = $_POST['storeID'];
echo json_encode(array("ListProduct"=>$services->getListProductOneStore($store)));
?>
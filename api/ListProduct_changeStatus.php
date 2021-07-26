<?php
include ('../services/ListProduct_service.php');
$services = new ListProductService();
$storeID = $_POST['storeID'];
$productID = $_POST['productID'];
$status = $_POST['status'];
echo json_encode($services->changeStatus($storeID, $productID, $status));
?> 
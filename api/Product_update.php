<?php
include ('../services/Product_service.php');
$service=new ProductService();
$productID=$_POST['ProductID'];
$productName=$_POST['ProductName'];
$productPrice=$_POST['ProductPrice'];
$productImage=$_POST['ProductImage'];
$productNote=$_POST['ProductNote'];
$typeID=$_POST['TypeID'];

echo json_encode($service->update_Product($productID,$productName,$productPrice,$productImage,$productNote,$typeID));
?>
<?php
include ('../services/Product_service.php');
$service=new ProductService();
$productName=$_POST['ProductName'];
$productPrice=$_POST['ProductPrice'];
$productImage=$_POST['ProductImage'];
$productNote=$_POST['ProductNote'];
$typeID=$_POST['TypeID'];
echo $service->add_Product($productName,$productPrice,$productImage,$productNote,$typeID);
?>
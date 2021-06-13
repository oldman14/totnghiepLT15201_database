<?php
include ('../services/Product_service.php');
$service=new ProductService();
$productName=$_POST['ProductName'];
$productPrice=$_POST['ProductPrice'];
$productImage=$_POST['ProductImage'];
$productNote=$_POST['ProductNote'];
$typeID=$_POST['TypeID'];

$result = $service->add_Product($productName,$productPrice,$productImage,$productNote,$typeID);

if($result == 0){
    $response['error'] = true; 
    $response['message'] = 'Fail to insert Product';
}elseif($result == 1){
    $response['error'] = false; 
    $response['message'] = 'Insert Success';
}elseif($result == 4){
    $response['error'] = true;
    $response['message']='Product Name is Exist';
}else{
    $response['error'] = true;
    $response['message']='Fail to insert Product';
}
echo json_encode($response);
?>
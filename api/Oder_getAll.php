<?php
include '../services/Order_service.php';
$service = new OrderService();
$service->db->connect();
$store = $_POST['storeID'];
if(isset($_POST['status'])){
    echo json_encode(array("Order"=>$service->getAllOrder($store,$_POST['status'])));
    }else{
    echo json_encode(array("Order"=>$service->getAllOrder2($store)));
    }
    $service->db->close();
?>
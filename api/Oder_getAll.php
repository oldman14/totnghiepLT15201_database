<?php
include '../services/oder_service.php';
$service = new OrderService();
$service->db->connect();
$store = $_POST['storeID'];
$status = $_POST['status'];
echo json_encode(array("Order"=>$service->getAllOrder($store,$status)));
$service->db->close();
?>
<?php
include '../services/oder_service.php';
$orderID = $_POST['orderID'];
$status = $_POST['status'];
$shipID = $_POST['shipID'];
$message = $_POST['message'];
$service =  new OrderService();
$service->db->connect();
echo json_encode($service->order_update($orderID, $status,$shipID,$message));
$service->db->close();
?>
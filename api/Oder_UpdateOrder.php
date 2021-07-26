<?php
include '../services/Order_service.php';
$orderID = $_POST['orderID'];
$status = $_POST['status'];
$message = $_POST['message'];
$service =  new OrderService();
$service->db->connect();
echo json_encode($service->order_update1($orderID, $status,$message));
$service->db->close();
?> 
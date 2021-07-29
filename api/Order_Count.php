<?php
include ('../services/Order_service.php');
$services = new OrderService();
$services->db->connect();
$storeID = $_POST['storeID'];
echo $services->count($storeID);
$services->db->close();
?>
<?php
include ('../services/Order_service.php');
$services = new OrderService();
$services->db->connect();
$storeID = $_POST['storeID'];
echo $services->TotalDay($storeID);
$services->db->close();
?>
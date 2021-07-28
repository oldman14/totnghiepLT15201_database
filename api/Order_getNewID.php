<?php
include ('../services/Order_service.php');
$services = new OrderService();
$services->db->connect();
echo $services->getNewID();
$services
?>
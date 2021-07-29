<?php
include ('../services/Order_service.php');
$services = new OrderService();
$services->db->connect();
$storeID = $_POST['storeID'];
echo json_encode(array("Total"=>$services->TotalYear($storeID)));
$services->db->close();
?>
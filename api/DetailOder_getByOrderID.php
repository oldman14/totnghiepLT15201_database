<?php
include '../services/Detailoder_service.php';
$service = new DetailorderService();
$service->db->connect();    
$orderID = $_POST['orderID'];
echo json_encode(array("DetailOrder"=>$service->getByOrderID($orderID)));
$service->db->close();
?>
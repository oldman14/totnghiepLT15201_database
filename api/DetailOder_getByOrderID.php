<?php
include '../services/Detailoder_service.php';
$service = new DetailOderService();
$service->db->connect();    
$orderID = $_POST['OrderID'];
echo json_encode(array("DetailOrder"=>$service->getByOrderID($orderID)));
?>  
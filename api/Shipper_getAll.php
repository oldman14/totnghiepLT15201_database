<?php
include '../services/Shipper_service.php';
$service = new ShipperService();
$service->db->connect();
$storeID = $_POST['storeID'];
$result = $service->getAll_shipper($storeID);
echo json_encode(array("Shipper"=>$result));
$service->db->close();
?>
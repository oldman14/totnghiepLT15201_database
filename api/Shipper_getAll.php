<?php
include '../services/Shipper_service.php';
$service = new ShipperService();
$service->db->connect();
$result = $service->getAll_shipper();
echo json_encode(array("shipper"=>$result));
$service->db->close();
?>
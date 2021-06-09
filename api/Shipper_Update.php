<?php
include '../services/Shipper_service.php';
$ShipID = $_POST['ShipID'];
$Status = $_POST['Status'];
$service =  new ShipperService();
$service->db->connect();
$result = $service->shipper_update($ShipID, $Status);
echo json_encode(array("Shipper"=>$result));
$service->db->close();
?>
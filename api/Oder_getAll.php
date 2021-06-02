<?php
include '../services/oder_service.php';
$service = new OderService();
$service->db->connect();
$result = $service->getAll_oder();
echo json_encode(array("oder"=>$result));
$service->db->close();
?>
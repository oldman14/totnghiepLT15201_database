<?php
include '../servcies/Oder_service.php';
$OderID = $_POST['OderID'];
$Status = $_POST['Status'];
$service =  new OderService();
$service->db->connect();
$result = $service->oder_update($OderID, $Status);
echo json_encode(array("array"=>$result));
$service->db->close();
?>
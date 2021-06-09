<?php
include ('../services/TypeProduct_services.php');
$service = new TypeProduct();
$service->db->connect();
$typeID = $_POST['typeID'];
$typeName = $_POST['typeName'];
$typeNote = $_POST['typeNote'];
echo json_encode($service->update($typeID,$typeName, $typeNote));
$service->db->close();
?>
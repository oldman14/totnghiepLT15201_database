<?php
include ('../services/Shipper_service.php');
$services = new ShipperService();
echo json_encode(array("Shipper"=>$services->getAll()));

?>
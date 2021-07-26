<?php
include ('../services/Shipper_service.php');

$service = new ShipperService();
$shipID = $_POST['shipID'];
echo json_encode($service->getShipper($shipID));

?> 
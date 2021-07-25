<?php
include ('../services/Shipper_service.php');

$service = new ShipperService();
$phone = $_POST['phone'];
echo json_encode($service->getItemShipper($phone));

?>
<?php
include ('../services/Shipper_service.php');
$services = new ShipperService();
$shipName = $_POST['shipName'];
$shipImage = $_POST['shipImage'];
$shipPhone = $_POST['shipPhone'];
$shipNumberCar = $_POST['shipNumberCar'];
$storeID = $_POST['storeID'];
echo $services->insert($shipName,$shipImage,$shipPhone,$shipNumberCar,$storeID);
?>
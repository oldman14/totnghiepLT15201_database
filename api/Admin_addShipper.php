<?php
include ('../services/Shipper_service.php');
$services = new ShipperService();
$shipName = $_POST['shipName'];
$shipImage = $_POST['shipImage'];
$shipPhone = $_POST['shipPhone'];
$shipNumberCar = $_POST['shipNumberCar'];
$storeID = $_POST['storeID'];
$result =  $services->insert($shipName,$shipImage,$shipPhone,$shipNumberCar,$storeID);
if($result==1){
    echo 1;
}else{
    echo -1;
}
?>
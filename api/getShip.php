<?php
 include ('../services/Shipper_service.php');
 $service=new ShipperService();
 $shipID=$_POST['ShipID'];
 echo json_encode($service->getShip($shipID));
?>
<?php
 include ('../services/Shipper_service.php');
 $service=new ShipperService();
 $phone=$_POST['ShipPhone'];
 echo json_encode($service->getShipperName($phone));
?>
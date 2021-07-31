<?php
 include ('../services/Shipper_service.php');
 $service=new ShipperService();
 $shipName=$_POST['ShipName'];
 $shipPhone=$_POST['ShipPhone'];
 $shipNumberCar =$_POST['ShipNumberCar'];
 $shipImage=$_POST['ShipImage'];
 $storeID=$_POST['StoreID'];
 echo $service->update_Shipper($shipName,$shipPhone,$shipNumberCar,$shipImage,$storeID);
?>
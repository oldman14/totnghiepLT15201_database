<?php
     require_once ('../services/Shipper_service.php');
     $service =new ShipperService();
     echo json_encode(array("shippers"=>$service->getAll_Shipper()));
?>
<?php
     require_once ('../services/Shipper_service.php');
     $service = new ShipperService();
     $storeID = $_POST['storeID'];
     $result = $service->getAll_shipper($storeID);
     echo json_encode(array("Shipper"=>$result));
?>
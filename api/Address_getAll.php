<?php
  include '../services/Address_service.php';
  $service =new AddressService();
  echo json_encode(array("Address"=>$service->getAll_Address()));
?>
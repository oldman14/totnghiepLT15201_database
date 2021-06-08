<?php
  include '../services/Address_service.php';
  $service=new AddressService();
  $userID= $_POST['UserID'];
  $addressName=$_POST['AddressName'];
  $addressLat=$_POST['AddressLat'];
  $addressLong=$_POST['AddressLong'];
  echo json_encode($service->insert_Address($userID,$addressName,$addressLat,$addressLong));

?>
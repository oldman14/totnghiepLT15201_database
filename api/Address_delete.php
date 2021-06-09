<?php
include('../services/product_service.php');
$service = new AddressService();
$addressID=$_POST['AddressID'];
echo json_encode( $service->delete_Address($addressID));
 ?>
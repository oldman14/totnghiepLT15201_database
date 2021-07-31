<?php
include ('../services/Order_service.php');
$service = new OrderService();
$shipID = $_POST['ShipID'];
echo json_encode(array("orders"=>$service->getItemOrder1($shipID)));
?>
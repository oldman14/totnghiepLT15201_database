<?php
include ('../services/Error_service.php');
$services = new ErrorServices();
$services->db->connect();
$orderID = $_POST['orderID'];
echo json_encode($services->Infor_Error($orderID));
$services->db->close();
?>
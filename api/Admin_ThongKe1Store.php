<?php
include ('../services/Order_service.php');
$services = new OrderService();
$year = $_POST['year'];
$storeID = $_POST['storeID'];
echo json_encode($services->ThongKeAll1Store($year,$storeID));
?>
<?php
include ('../services/Order_service.php');
$services = new OrderService();
$year = $_POST['year'];
echo json_encode($services->ThongKeAll($year));
?>
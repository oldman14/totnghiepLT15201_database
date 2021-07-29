<?php
include ('../services/Shipper_service.php')
$services = new ShipperService();
$services->db->connect();

$services->db->close();
?>
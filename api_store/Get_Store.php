<?php
include ('../services/StoreServices.php');

$service = new StoreServices();
$service->db->connect();
echo json_encode($service->getAll());
$service->db->close();
?>
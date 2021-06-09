<?php
include ('../services/Store_services.php');

$service = new StoreServices();
$service->db->connect();
echo json_encode($service->getAll());
$service->db->close();
?>
<?php
include ('../services/TypeProduct_services.php');

$service = new TypeProduct();
$service->db->connect();
echo json_encode(array("TypeProduct"=>$service->getAll()));
$service->db->close();
?>
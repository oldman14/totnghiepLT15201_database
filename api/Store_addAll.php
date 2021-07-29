<?php
include ('../services/Store_services.php');
$services = new StoreServices();
$services->db->connect();
$list = $_POST['list'];

echo $services->addAllStore($list);
$services->db->close();

?>
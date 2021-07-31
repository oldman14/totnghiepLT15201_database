<?php
include ('../services/Error_service.php');
$services = new ErrorServices();
$services->db->connect();
$orderID = $_POST['orderID'];
$shipID = $_POST['shipID'];
$image = $_POST['image'];
$note = $_POST['note'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
echo $services->Insert_Error($orderID,$shipID,$image,$note,$lat,$lng);
$services->db->close();
?>
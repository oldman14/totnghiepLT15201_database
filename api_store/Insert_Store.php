<?php
include ('../services/StoreServices.php');
$service = new StoreServices();
$service->db->connect();
$storeName = $_POST['storeName'];
$storeAddress = $_POST['storeAddress'];
$storePhone = $_POST['storePhone'];
$storeLat = $_POST['storeLat'];
$storeLong = $_POST['storeLong'];
$storeImage = $_POST['storeImage'];
$token = $_POST['token'];
echo json_encode($service->insert($storeName, $storeAddress, $storePhone, $storeLat, $storeLong, $storeImage,$token));
$service->db->close();
?>
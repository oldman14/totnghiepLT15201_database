<?php
include ('../services/Store_services.php');
$service = new StoreServices();
$service->db->connect();
$storeID = $_POST['storeID'];
$storeName = $_POST['storeName'];
$storeAddress = $_POST['storeAddress'];
$storePhone = $_POST['storePhone'];
$storeLat = $_POST['storeLat'];
$storeLong = $_POST['storeLong'];
$storeImage = $_POST['storeImage'];
$token = $_POST['token'];

echo json_encode($service->update($storeID,$storeName, $storeAddress, $storePhone, $storeLat, $storeLong, $storeImage,$token));
$service->db->close();
?>
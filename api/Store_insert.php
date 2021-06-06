<?php
include ('../services/Store_services.php');
$service = new StoreServices();
$service->db->connect();
$storeName = $_POST['storeName'];
$storeAddress = $_POST['storeAddress'];
$storePhone = $_POST['storePhone'];
$storeLat = $_POST['storeLat'];
$storeLong = $_POST['storeLong'];
$storeImage = $_POST['storeImage'];
$token = $_POST['token'];
$response = json_encode($service->insert($storeName, $storeAddress, $storePhone, $storeLat, $storeLong, $storeImage,$token));
if($response==1){
    echo "Insert Success!";
}else if($response==2){
    echo "Store is exits!";
}else{
    echo "Insert Fail!";
}
$service->db->close();
?>
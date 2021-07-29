<<?php
include ('../services/FailOrder_service.php');
$service=new FailOrderService();
$service->db->connect();
$orderID = $_POST['orderID'];
$image = $_POST['image'];
$note = $_POST['note'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$response = json_encode($service->insert_failorder($orderID,$image,$note,$lat,$lng));
if($response==1){
    echo "Insert Success!";
}else if($response==2){
    echo "Store is exits!";
}else{
    echo "Insert Fail!";
}
$service->db->close();
   ?>
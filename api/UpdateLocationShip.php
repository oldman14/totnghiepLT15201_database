<?php
include ('../services/Shipper_service.php');
$service = new ShipperService();
$phone = $_POST['ShipPhone'];
$shipLat = $_POST['ShipLat'];
$shipLong = $_POST['ShipLong'];
 $result=$service->UpdateLocationShip($phone, $shipLat,$shipLong);
if($result == true){
    $response['error'] = true; 
    $response['message'] = 'Update Success!';
}else{
    $response['error'] = false;
    $response['message']='Error, please try again!';
}
echo json_encode($response);
?>
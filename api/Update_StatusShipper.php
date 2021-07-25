<?php
include ('../services/Shipper_service.php');
$service = new ShipperService();
$phone = $_POST['ShipPhone'];
$status = $_POST['Status'];
 $result=$service->Update_Status($phone, $status);
if($result == true){
    $response['error'] = true; 
    $response['message'] = 'Update Success!';
}else{
    $response['error'] = false;
    $response['message']='Error, please try again!';
}
echo json_encode($response);
?>
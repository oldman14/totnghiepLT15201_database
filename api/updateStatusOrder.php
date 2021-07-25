<?php
include ('../services/Order_service.php');
$service = new OrderService();
$service->db->connect();
$orderID = $_POST['OrderID'];
$status = $_POST['Status'];
 $result=$service->updateStatus($orderID, $status);
if($result == true){
    $response['error'] = true; 
    $response['message'] = 'Update Success!';
}else{
    $response['error'] = false;
    $response['message']='Error, please try again!';
}
echo json_encode($response);
?>
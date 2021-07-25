<?php
include ('../services/Store_services.php');
$service =new StoreServices();
$token = $_POST['token'];
    $phone = $_POST['phone'];
    $result = $service->login($phone,$token);

    if($result == 1){
        $response['error'] = true; 
        $response['message'] = 'Store not exist!';
    }elseif($result == 2){
        $response['error'] = false; 
        $response['message'] = 'Store login successfully';
    }else{
        $response['error'] = true;
        $response['message']='Error, please try again!';
    }
    echo json_encode($response);
?>
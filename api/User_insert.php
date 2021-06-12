<?php
include ('../services/Users_service.php');
$service =new UserService();
$token = $_POST['token'];
    $phone = $_POST['phone'];
    $result = $service->loginRegisDevice($phone,$token);

    if($result == 0){
        $response['error'] = false; 
        $response['message'] = 'User registered successfully';
    }elseif($result == 2){
        $response['error'] = false; 
        $response['message'] = 'User login successfully';
    }else{
        $response['error'] = true;
        $response['message']='Error, please try again!';
    }
    echo json_encode($response);
?>
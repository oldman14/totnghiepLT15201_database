<?php
include ('../services/DbOperation.php');
$db = new DbOperation();
$response =array();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $token = $_POST['token'];
    $phone = $_POST['phone'];
    $result = $db->loginRegisDevice($phone,$token);

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
}else{
    $response['error']=true;
    $response['message']='Invalid Request...';
}
echo json_encode($response);
?>
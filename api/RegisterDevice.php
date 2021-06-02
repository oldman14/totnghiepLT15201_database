<?php 
		require_once '../services/DbOperation.php';

	$response = array(); 

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$token = $_POST['token'];
		$phone = $_POST['phone'];
		$pass = $_POST['pass'];

		$db = new DbOperation(); 

		$result = $db->registerDevice($phone,$pass,$token);

		if($result == 0){
			$response['error'] = false; 
			$response['message'] = 'Device registered successfully';
		}elseif($result == 2){
			$response['error'] = true; 
			$response['message'] = 'Device already registered';
		}else{
			$response['error'] = true;
			$response['message']='Device not registered';
		}
	}else{
		$response['error']=true;
		$response['message']='Invalid Request...';
	}

	echo json_encode($response);
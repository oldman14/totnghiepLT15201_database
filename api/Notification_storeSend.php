<?php 
//importing required files 
require_once '../services/Notification_services.php';
require_once '../Firebase.php';
require_once '../entities/Push.php'; 

$db = new Notification();

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){	
	if(isset($_POST['title']) and isset($_POST['message']) and isset($_POST['phone'])and isset($_POST['object'])){

		$push = null; 
		if(isset($_POST['image'])){
			$push = new Push(
					$_POST['title'],
					$_POST['message'],
					$_POST['phone']
				);
		}else{
			$push = new Push(
					$_POST['title'],
					$_POST['message'],
					null
				);
		}

		$mPushNotification = $push->getPush(); 

		if ($_POST['object'] == 0){
			$devicetoken = $db->getTokenByPhone($_POST['phone']);
		}else{
			$devicetoken = $db->getTokenByPhoneShip($_POST['phone']);
		}
		$firebase = new Firebase(); 

		$firebase->send($devicetoken, $mPushNotification);
		$response['error']=false;
		$response['message']='Send Success';
	}else{
		$response['error']=true;
		$response['message']='Parameters missing';
	}
}else{
	$response['error']=true;
	$response['message']='Invalid request';
}

echo json_encode($response);
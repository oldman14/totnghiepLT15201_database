<?php 
//importing required files 
require_once '../services/Notification_services.php';

require_once '../Firebase.php';
require_once '../entities/Push.php'; 

$db = new Notification();

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){	
	if(isset($_POST['title']) and isset($_POST['message'])) {
		$push = null; 
		if(isset($_POST['image'])){
			$push = new Push(
					$_POST['title'],
					$_POST['message'],
					$_POST['image']
				);
		}else{
			$push = new Push(
					$_POST['title'],
					$_POST['message'],
					null
				);
		}

		$mPushNotification = $push->getPush(); 

		$devicetoken = $db->getAllTokens();

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
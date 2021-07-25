<?php
include ('../services/Users_service.php');
$service = new UserService();
$userID = $_POST['UserID'];
echo json_encode($service->getUserToOrder($userID));
?>
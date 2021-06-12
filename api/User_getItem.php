<?php
include ('../services/Users_service.php');

$service = new UserService();
$phone = $_POST['phone'];
echo json_encode($service->getItemUser($phone));

?>
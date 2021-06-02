<?php
include '../services/user_Service.php';
$userName = $_POST['userName'];
$password = $_POST['password'];
$newPass = $_POST['newPass'];
$service = new UserService();
$service->db->connect();
$result = $service->update_pass($userName, $password,$newPass);
echo json_encode(array("user"=>$result));
$service->db->close();
?>
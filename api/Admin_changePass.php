<?php
include ('../services/Admin_services.php');
$service = new Admin();
$service->db->connect();
$username = $_POST['username'];
$password = $_POST['password'];
$newPass = $_POST['newPassword'];
echo json_encode($service->changePass($username,$password, $newPass));
$service->db->close();
?>
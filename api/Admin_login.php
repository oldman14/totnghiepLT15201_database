<?php
include ('../services/Admin_services.php');
$service = new Admin();
$service->db->connect();
$username = $_POST['username'];
$password = $_POST['password'];
$token = $_POST['token'];
echo json_encode($service->login($username,$password, $token));
$service->db->close();
?>
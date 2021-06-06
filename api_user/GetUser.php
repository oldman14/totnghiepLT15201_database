<?php
include ('../services/DbOperation.php');

$service = new DbOperation();
$phone = $_POST['phone'];
echo json_encode($service->getUser($phone));
?>
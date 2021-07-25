<?php
include ('../services/Store_Services.php');

$service = new StoreServices();
$phone = $_POST['phone'];
echo json_encode($service->getItemStore($phone));

?>
<?php
 include ('../services/Order_service.php');
 $service=new OrderService();
 $userID=$_POST['UserID'];
 echo json_encode($service->getShipperViewUsers($userID));
?>
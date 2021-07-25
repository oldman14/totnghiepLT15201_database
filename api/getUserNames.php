<?php
 include ('../services/Users_service.php');
 $service=new UserService();
 $phone=$_POST['UserPhone'];
 echo json_encode($service->getUserNames($phone));
?>
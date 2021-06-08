<?php
     require_once ('../services/Users_service.php');
     $service =new UserService();
     echo json_encode(array("users"=>$service->getAll_User()));
?>
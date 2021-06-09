<?php
include ('../services/Users_service.php');
$service =new UserService();
$userPhone=$_POST['UserPhone'];
$userName=$_POST['UserName'];
 echo json_encode($service->add_User($userPhone,$userName));

?>
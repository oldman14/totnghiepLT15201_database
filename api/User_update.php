<?php
 include ('../services/Users_service.php');
 $service=new UserService();
 $userPhone=$_POST['UserPhone'];
 $userMail =$_POST['UserMail'];
 $userBirthday=$_POST['UserBirthday'];
 $userImage=$_POST['UserImage'];
 $token=$_POST['Token'];
 echo json_encode($service->update_User($userPhone,$userMail,$userBirthday,$userImage,$token));

?>
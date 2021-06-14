<?php
 include ('../services/Users_service.php');
 $service=new UserService();
 $userPhone=$_POST['UserPhone'];
 $userName=$_POST['UserName'];
 $userMail =$_POST['UserMail'];
 $userBirthday=$_POST['UserBirthday'];
 $userImage=$_POST['UserImage'];
 echo json_encode($service->update_User($userPhone,$userName,$userMail,$userBirthday,$userImage));

?>
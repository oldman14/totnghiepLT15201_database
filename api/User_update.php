<?php
 include ('../services/Users_service.php');
 $service=new UserService();
 $userPhone=$_POST['UserPhone'];
 $userName=$_POST['UserName'];
 $userMail =$_POST['UserMail'];
 $userBirthday=$_POST['UserBirthday'];
 $userImage=$_POST['UserImage'];
 $result = $service->update_User($userPhone,$userName,$userMail,$userBirthday,$userImage);
 if($result == true){
    $response['error'] = false; 
    $response['message'] = 'Update Success!';
}else{
    $response['error'] = true;
    $response['message']='Error, please try again!';
}
echo json_encode($response);


?>
<?php
require_once ('../db/DbConnect.php');

require_once ('../entities/Users.php');


class UserService{

    private $db;
    function __construct(){
		$this->db = new DBConnect();
        $this->conn = $this->db->connect();
	}
    function getAll_User(){
         return $this->db->select('SELECT * FROM users');
        
    }
    function add_User($userPhone,$userName){
        return $this->db->query("INSERT INTO users(UserPhone,UserName)  VALUES ('$userPhone','$userName')");
    }

    function update_User($userPhone,$userMail,$userBirthday,$userImage,$token){
        return $this->db->query("UPDATE users SET UserMail='$userMail',UserBirthday='$userBirthday',UserImage='$userImage',Token='$token' WHERE UserPhone = $userPhone ");
    }

}

?>
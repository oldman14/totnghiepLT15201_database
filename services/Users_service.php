

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
    function add_User($userPhone,$token){
        return $this->db->query("INSERT INTO users(UserPhone,Token)  VALUES ('$userPhone','$token')");
    }

    function update_User($userPhone,$userMail,$userBirthday,$userImage,$token){
        return $this->db->query("UPDATE users SET UserMail='$userMail',UserBirthday='$userBirthday',UserImage='$userImage',Token='$token' WHERE UserPhone = $userPhone ");
    }

    public function loginRegisDevice($phone,$token){
        if(!$this->isPhoneExist($phone)){
            $stmt = $this->conn->prepare("INSERT INTO users (UserPhone, Token,UserImage) VALUES (?,?,'https://assets.webiconspng.com/uploads/2017/09/Avatar-PNG-Image-87443.png')");
            $stmt->bind_param("ss",$phone,$token);
            if($stmt->execute())
                return 0; 
            return 1; 
        }else{
            $stmt = $this->conn->prepare("UPDATE users SET Token = ? WHERE UserPhone = ?");
            $stmt->bind_param("ss",$token,$phone);
            if($stmt->execute())
                return 2; 
            return 3; 
        }
    }

    private function isPhoneExist($phone){
        $stmt = $this->conn->prepare("SELECT UserID FROM users WHERE UserPhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    public function getItemUser($phone){
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE UserPhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
    }
}

?>
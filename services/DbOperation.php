<?php

include ('../db/DbConnect.php');

class DbOperation
{

    private $conn;

    function __construct()
    {
        $db = new DbConnect();
        $this->conn = $db->connect();
    }



    public function loginRegisDevice($phone,$token){
        if(!$this->isPhoneExist($phone)){
            $stmt = $this->conn->prepare("INSERT INTO user (UserPhone, Token,UserImage) VALUES (?,?,'https://assets.webiconspng.com/uploads/2017/09/Avatar-PNG-Image-87443.png')");
            $stmt->bind_param("ss",$phone,$token);
            if($stmt->execute())
                return 0; 
            return 1; 
        }else{
            $stmt = $this->conn->prepare("UPDATE user SET Token = ? WHERE UserPhone = ?");
            $stmt->bind_param("ss",$token,$phone);
            if($stmt->execute())
                return 2; 
            return 3; 
        }
    }

    private function isPhoneExist($phone){
        $stmt = $this->conn->prepare("SELECT UserID FROM user WHERE UserPhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }


    public function getAllTokens(){
        $stmt = $this->conn->prepare("SELECT token FROM users");
        $stmt->execute(); 
        $result = $stmt->get_result();
        $tokens = array(); 
        while($token = $result->fetch_assoc()){
            array_push($tokens, $token['token']);
        }
        return $tokens; 
    }

    public function getTokenByPhone($phone){
        $stmt = $this->conn->prepare("SELECT Token FROM user WHERE UserPhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return array($result['Token']);        
    }

    public function getUser($phone){
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE UserPhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
    }
}
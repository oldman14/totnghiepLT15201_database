<?php

include ('../db/DbConnect.php');

class Notification
{

    private $conn;

    function __construct()
    {
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function getAllTokens(){
        $stmt = $this->conn->prepare("SELECT Token FROM users");
        $stmt->execute(); 
        $result = $stmt->get_result();
        $tokens = array(); 
        while($token = $result->fetch_assoc()){
            array_push($tokens, $token['Token']);
        }
        return $tokens; 
    }

    public function getTokenByPhone($phone){
        $stmt = $this->conn->prepare("SELECT Token FROM users WHERE UserPhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return array($result['Token']);        
    }

    
    public function getTokenByPhoneFromStore($phone){
        $stmt = $this->conn->prepare("SELECT Token FROM store WHERE StorePhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return array($result['Token']);        
    }
}
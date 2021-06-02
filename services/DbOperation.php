<?php

include ('../db/DbConnect.php');

class DbOperation
{

    private $con;

    function __construct()
    {
        $db = new DbConnect();

        $this->con = $db->connect();
    }

    public function registerDevice($phone, $pass,$token){
        if(!$this->isEmailExist($phone)){
            $stmt = $this->con->prepare("INSERT INTO users (phone, pass, token) VALUES (?,?,?) ");
            $stmt->bind_param("sss",$phone, $pass,$token);
            if($stmt->execute())
                return 0; 
            return 1; 
        }else{
            return 2;
        }
    }

    private function checklogin($phone,$pass){
        $stmt = $this->con->prepare("SELECT * FROM users WHERE phone = ? AND pass =?");
        $stmt->bind_param("ss",$phone,$pass);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    public function loginDevice($phone, $pass, $token){
        if($this->checklogin($phone, $pass)){
            $stmt = $this->con->prepare("UPDATE users SET token = ? WHERE phone = ? AND pass = ? ");
            $stmt->bind_param("sss",$token, $phone,$pass);
            if($stmt->execute())
                return 0;
            return 1; 
        }else{
            return 2;
        }
    }

    private function isEmailexist($phone){
        $stmt = $this->con->prepare("SELECT userId FROM users WHERE phone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }


    public function getAllTokens(){
        $stmt = $this->con->prepare("SELECT token FROM users");
        $stmt->execute(); 
        $result = $stmt->get_result();
        $tokens = array(); 
        while($token = $result->fetch_assoc()){
            array_push($tokens, $token['token']);
        }
        return $tokens; 
    }

    public function getTokenByEmail($phone){
        $stmt = $this->con->prepare("SELECT token FROM users WHERE phone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return array($result['token']);        
    }

    public function getAllDevices(){
        $stmt = $this->con->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result; 
    }

    public function getuser($phone){
        $stmt = $this->con->prepare("SELECT * FROM users WHERE phone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
    }
}
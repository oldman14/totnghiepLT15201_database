<?php
include ('../db/DbConnect.php');

class Admin{
	
    public $db;

    function __construct(){
        $this->db = new DBConnect();
        $this->conn = $this->db->connect();
    }

    function login($username,$password,$token){
        if(!$this->check($username, $password)){
            return false;
        }else{
            return $this->db->query("UPDATE admin SET Token = '$token' WHERE Username = '$username'");
        }  
    }

    function changePass($username,$password,$newPass){
        if(!$this->check($username, $password)){
            return false;
        }else{
            return $this->db->query("UPDATE admin SET Password = '$newPass' WHERE Username = '$username'");
        }
    }

    private function check($username, $password){
        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE Username = ? AND Password =?");
        $stmt->bind_param("ss",$username, $password);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }
}
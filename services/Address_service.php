<?php
 include '../db/DbConnect.php';
 include '../entities/Address.php';

 class AddressService{

    private $db;
     function __construct()
     {
         $this->db= new DBConnect();
         $this->conn = $this->db->connect();
     }
     function getAll_Address(){
         return $this->db->select("SELECT * FROM address");
     }
     function insert_Address($userID,$addressName,$addressLat,$addressLong){
         return $this->db->query("INSERT INTO address(UserID,AddressName,AddressLat,AddressLong) VALUES ('$userID','$addressName','$addressLat','$addressLong')");
     }
     function delete_Address($addressID){
         return $this->db->query("DELETE FROM address WHERE AddressID='$addressID'");
     }



    }

?>
<?php
 include '../db/DbConnect.php';
 include '../entities/Address.php';

 class AddressService{

    private $db;
     function __construct()
     {
         $this->db= new DBConnect();
        
     }
     function getAll_Address(){
         return $this->db->select('SELECT * FROM  addres');
     }
     function insert_Address($userID,$addressName,$addressLat,$addressLong){
         return $this->db->query("INSERT INTO addres(UserID,AddressName,AddressLat,AddressLong) VALUES ('$userID','$addressName','$addressLat','$addressLong')");
     }
     function delete_Address($addressID){
         return $this->db->query("DELETE FROM addres WHERE AddressID='$addressID'");
     }



    }

?>
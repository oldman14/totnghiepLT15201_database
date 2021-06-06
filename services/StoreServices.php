<?php
include ('../db/DbConnect.php');

class StoreServices{
	
    public $db;

    function __construct(){
        $this->db = new DBConnect();
    }

    function getAll(){
        return $this->db->select("SELECT * FROM store");
    }

    function insert($storeName, $storeAddress, $storePhone, $storeLat, $storeLong, $storeImage,$token){
        return $this->db->query("INSERT INTO store (StoreName,StoreAddress,StorePhone,StoreLat,StoreLong,StoreImage,Token) VALUES ('$storeName', '$storeAddress', '$storePhone', '$storeLat', '$storeLong',' $storeImage','$token') ");
    }

    function update($storeID,$storeName, $storeAddress, $storePhone, $storeLat, $storeLong, $storeImage,$token){
        return $this->db->query("UPDATE store SET StoreName = '$storeName',StoreAddress= '$storeAddress', StorePhone ='$storePhone', StoreLat = '$storeLat', StoreLong = '$storeLong', StoreImage = '$storeImage', Token = '$token' WHERE StoreID = '$storeID'");
    }
}
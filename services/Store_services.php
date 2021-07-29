<?php
include ('../db/DbConnect.php');

class StoreServices{
	
    public $db;

    function __construct(){
        $this->db = new DBConnect();
        $this->conn = $this->db->connect();
    }

    function getAll(){
        return $this->db->select("SELECT * FROM store");
    }

    function update($storeID,$storeName, $storeAddress, $storePhone, $storeLat, $storeLong, $storeImage,$token){
        return $this->db->query("UPDATE store SET StoreName = '$storeName',StoreAddress= '$storeAddress', StorePhone ='$storePhone', StoreLat = '$storeLat', StoreLong = '$storeLong', StoreImage = '$storeImage', Token = '$token' WHERE StoreID = '$storeID'");
        
    }

    function insert($storeName, $storeAddress, $storePhone, $storeLat, $storeLong, $storeImage,$token){
        if(!$this->checkStore($storeName,$storeAddress)){
            $insert = $this->db->query("INSERT INTO store (StoreName,StoreAddress,StorePhone,StoreLat,StoreLng,StoreImage,Token) VALUES ('$storeName', '$storeAddress', '$storePhone', '$storeLat', '$storeLong',' $storeImage','$token') ");
            if($insert ==1){
                $store = $this->getStoreID($storeName, $storePhone);
                $storeID =  implode(" ",$store);
                $product = $this->db->select("SELECT ProductID FROM product");
                for($i = 0; $i< count($product); $i++){
                    $productID =  implode(" ",array_values($product[$i]));
                    $this->addListProduct($productID,$storeID);
                }
                return 1;
            }
            return 0;
        }else{
            return 2;
        }
    }

    function getStoreID($storeName, $storePhone){
        $stmt = $this->conn->prepare("SELECT StoreID FROM store WHERE StoreName=? AND StorePhone=?");
        $stmt->bind_param("ss",$storeName,$storePhone);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return array($result['StoreID']);    
    }

    function addListProduct($productID, $storeID){
        return $this->db->query("INSERT INTO listproduct(ProductID, StoreID) VALUES ('$productID','$storeID')");
    }
    

    function checkStore($storeName,$storeAddress){
        $stmt = $this->conn->prepare("SELECT StoreID FROM store WHERE StoreName = ? AND StoreAddress =?");
        $stmt->bind_param("ss",$storeName, $storeAddress);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    public function login($phone,$token){
        if(!$this->isPhoneExist($phone)){
            return 1; 
        }else{
            $stmt = $this->conn->prepare("UPDATE store SET Token = ? WHERE StorePhone = ?");
            $stmt->bind_param("ss",$token,$phone);
            if($stmt->execute())
                return 2; 
            return 3; 
        }
    }

    private function isPhoneExist($phone){
        $stmt = $this->conn->prepare("SELECT StoreID FROM store WHERE StorePhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    public function getItemStore($phone){
        $stmt = $this->conn->prepare("SELECT * FROM store WHERE StorePhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
    }

    public function getIFStore($storeID){
        $stmt = $this->conn->prepare("SELECT * FROM store WHERE StoreID = ?");
        $stmt->bind_param("s",$storeID);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
    }

    function addAllStore($arrayStore){
        $arrayMain = json_decode($arrayStore);
        for($i = 0; $i< count($arrayMain); $i++){
            $arrayChild = $arrayMain[$i];
            $this->insert($arrayChild[0],$arrayChild[1],$i,$arrayChild[2],$arrayChild[3],$arrayChild[4],"");
        }
        return 0;
    }

}
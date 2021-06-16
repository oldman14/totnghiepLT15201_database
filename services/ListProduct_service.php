<?php
 require_once ('../db/DbConnect.php');
 require_once ('../entities/ListProduct.php');

 class ListProductService{
      private $db;
     function __construct()
     {
         $this->db=new DBConnect();
         $this->conn = $this->db->connect();
     }
     function getAll_ListPro(){
         return $this->db->select('SELECT * FROM listproduct');
     }



     function getListProductOneStore($store){
        return $this->db->select("SELECT *  
        FROM listproduct
        INNER JOIN product
        ON listproduct.ProductID = product.ProductID WHERE StoreID = '$store'");
     }

     function getAllType(){
        return $this->db->select("SELECT * FROM typeproduct");
    }

    function changeStatus($storeID,$productID,$status){
        return $this->db->query("UPDATE listproduct SET Status='$status' WHERE StoreID= '$storeID' AND ProductID = '$productID'");
    }

    }
?>
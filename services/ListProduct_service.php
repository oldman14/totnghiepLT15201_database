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
    }
?>
<?php
 require_once ('../db/DB_Connect.php');
 require_once ('../entities/ListProduct.php');

 class ListProductService{
      private $db;
     function __construct()
     {
         $this->db=new DBConnect();
     }
     function getAll_ListPro(){
         return $this->db->select('SELECT * FROM listproduct');
     }
    }
?>
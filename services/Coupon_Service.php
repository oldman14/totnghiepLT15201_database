<?php
 require_once ('../db/DbConnect.php');
 require_once ('../entities/Product.php');
  class CouponService{
      public $db;
      function __construct()
      {
          $this->db=new DbConnect();
          $this->conn = $this->db->connect();
      }
      function get_Coupon($status){
          return $this->db->select("SELECT * FROM coupon WHERE Status='$status' ");
      }
 }

?>
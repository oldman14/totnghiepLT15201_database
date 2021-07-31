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

      function insert($CouponImage,$DateStart,$DateEnd,$CouponNote,$CouponCondition,$CouponPrice,$Status){
        return $this->db->query("INSERT INTO coupon(CouponImage,DateStart,DateEnd,CouponNote,CouponCondition,CouponPrice,Status) VALUES ('$CouponImage','$DateStart','$DateEnd','$CouponNote','$CouponCondition','$CouponPrice','$Status')");
      }

      function update($CouponID,$CouponImage,$DateStart,$DateEnd,$CouponNote,$CouponCondition,$CouponPrice,$Status){
        return $this->db->query("UPDATE coupon SET CouponImage='$CouponImage',DateStart='$DateStart',DateEnd='$DateEnd',CouponNote='$CouponNote',CouponCondition='$CouponCondition',CouponPrice='$CouponPrice',Status = '$Status' WHERE CouponID = '$CouponID'");

      }

      function getAll(){
          return $this->db->select("SELECT * FROM coupon WHERE DATE(NOW()) <= DATE(DateEnd) ");
      }

      function getAll1(){
        return $this->db->select("SELECT * FROM coupon");
    }
 }

?>
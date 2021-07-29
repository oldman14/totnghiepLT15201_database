<?php
 require_once ('../db/DbConnect.php');
  class FailOrderService{
      public $db;
      function __construct()
      {
          $this->db=new DbConnect();
          $this->conn = $this->db->connect();
      }
      function insert_failorder($orderID,$image,$note,$lat,$lng){
        return $this->db->query("INSERT INTO failorder(orderID,image,note,lat,lng) VALUES ('$orderID','$image','$note','$lat','$lng')");
      }
 }

?>
<?php
 require_once ('../db/DbConnect.php');
  class ErrorServices{
      public $db;
      function __construct()
      {
          $this->db=new DbConnect();
          $this->conn = $this->db->connect();
      }
      function Insert_Error($orderID,$shipID,$image,$note,$lat,$lng){
        return $this->db->query("INSERT INTO error(OrderID,ShipID,Image,Note,Lat,Lng) VALUES ('$orderID','$shipID','$image','$note','$lat','$lng')");
      }

      function Infor_Error($orderID){
        $stmt = $this->conn->prepare("SELECT * FROM error WHERE OrderID = ?");
        $stmt->bind_param("s",$orderID);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
      }
 }

?>
<?php
include '../db/DbConnect.php';
class OrderService
{
	public $db;

	function __construct(){
		$this->db = new DbConnect();
        $this->conn = $this->db->connect();
	}
	function getAllOrder($store, $status){
		return $this->db->select("SELECT * FROM `order` INNER JOIN users
        ON `order`.UserID = users.UserID WHERE StoreID = '$store' AND DATE(OrderDate) = DATE(NOW()) AND Status = '$status'  ORDER BY OrderDate");
	}
	function order_insert($UserID, $StoreID, $ShipperID,$CouponID, $TotalMoney, $Note, $Status){
		return $this->db->query("INSERT INTO `order` (UserID, StoreID,ShipperID, CouponID, TotalMoney,Note, Status) VALUES('$UserID', '$StoreID', '$ShipperID','$CouponID', $TotalMoney,$Note, $Status)");
	}
	function order_update($orderID, $Status,$shipID, $message){
		return $this->db->query("UPDATE `order` set Status='$Status', Note = '$message', ShipID = '$shipID' WHERE orderID='$orderID'");
	}

	function order_update1($orderID, $Status, $message){
		return $this->db->query("UPDATE `order` set Status='$Status', Note = '$message' WHERE orderID='$orderID'");
	}

}
?>
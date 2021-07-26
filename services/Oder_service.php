<?php
include '../db/DbConnect.php';
class OderService
{
	public $db;
	
	function __construct(){
		$this->db = new DbConnect();
	}
	function getAll_oder(){
		return $this->db->select("SELECT * FROM orderfood");
	}
	function oder_insert($UserID, $StoreID, $ShipperID,$CouponID, $TotalMoney, $Note, $Status){
		return $this->db->query("INSERT INTO orderfood (UserID, StoreID,ShipperID, CouponID, TotalMoney,Note, Status) VALUES('$UserID', '$StoreID', '$ShipperID','$CouponID', $TotalMoney,$Note, $Status)");
	}	
	function oder_update($OderID, $Status){
		if ($this->db->query("UPDATE orderfood set Status='$Status' WHERE OderID='$OderID'")){
			return $this->db->select("SELECT * from orderfood where OderID='$OderID'");
		} else return null;
	}

	function getAllOrder1($store){
		return $this->db->select("SELECT * FROM `orderfood` INNER JOIN users
        ON `orderfood`.UserID = users.UserID WHERE StoreID = '$store' AND DATE(OrderDate) = DATE(NOW()) AND Status='Đang đợi xác nhận' OR Status ='Cửa hàng đang chuẩn bị'   ORDER BY OrderDate");
	}

	function order_update1($orderID, $Status, $message){
		return $this->db->query("UPDATE `orderfood` set Status='$Status', Note = '$message' WHERE orderID='$orderID'");
	}

	function done(){
		return $this->db->query("DELETE");
	}
}
?>
<?php
include '../db/DbConnect.php';
class OderService
{
	public $db;
	
	function __construct(){
		$this->db = new DbConnect();
	}
	function getAll_oder(){
		return $this->db->select("SELECT * FROM oder");
	}
	function oder_insert($UserID, $StoreID, $ShipperID,$CouponID, $TotalMoney, $Status){
		return $this->db->query("INSERT INTO oder (UserID, StoreID,ShipperID, CouponID, TotalMoney, Status) VALUES('$UserID', '$StoreID', '$ShipperID','$CouponID', $TotalMoney, $Status)");
	}	
	function oder_update($OderID, $Status){
		if ($this->db->query("UPDATE oder set Status='$Status' WHERE OderID='$OderID'")){
			return $this->db->select("SELECT * from oder where OderID='$OderID'");
		} else return null;
	}
}
?>
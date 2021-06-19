<?php 
include '../db/DbConnect.php';
class ShipperService
{
    public $db;
	
	function __construct(){
		$this->db = new DbConnect();
        $this->conn = $this->db->connect();
	}
    function getAll_shipper($storeID){
        return $this->db->select("SELECT * FROM shipper WHERE StoreID = '$storeID'");
    }
    function shipper_insert($ShipName, $ShipImage, $ShipPhone,$ShipNumberCar, $ShipLat, $ShipLong, $Status, $Token){
        return $this->db->query("INSERT INTO shipper (ShipName, ShipImage,ShipPhone, ShipNumberCar, ShipLat, ShipLong, Status, Token) VALUES ('$ShipName', '$ShipImage', '$ShipPhone','$ShipPhone', '$ShipLat','$ShipLong', '$Status', '$Token')");
    }
    function shipper_update($ShipID, $Status){
		if ($this->db->query("UPDATE shipper set Status='$Status' WHERE ShipID='$ShipID'")){
			return $this->db->select("SELECT * from Shipper where ShipID='$ShipID'");
		} else return null;
	}

    function getShipper($ShipID){
        $stmt = $this->conn->prepare("SELECT * FROM shipper WHERE ShipID = ?");
        $stmt->bind_param("s",$ShipID);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
    }
}
?>
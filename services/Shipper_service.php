

<?php
require_once ('../db/DbConnect.php');

require_once ('../entities/Shipper.php');


class ShipperService{

    private $db;
    function __construct(){
		$this->db = new DBConnect();
        $this->conn = $this->db->connect();
	}
    function getAll_shipper($storeID){
        return $this->db->select("SELECT * FROM shipper WHERE StoreID = '$storeID'");
    }

    function getAll(){
        return $this->db->select("SELECT * FROM shipper");
    }

    function add_Shipper($shipPhone,$token){
        return $this->db->query("INSERT INTO shipper(ShipPhone,Token)  VALUES ('$shipPhone','$token')");
    }

    function insert($shipName,$shipImage,$shipPhone,$shipNumberCar,$storeID){
        if($this->isPhoneExist($shipPhone)){
            return -1;   
        }
        return $this->db->query("INSERT INTO shipper(ShipName,ShipImage,ShipPhone,ShipNumberCar,StoreID)  VALUES ('$shipName','$shipImage','$shipPhone','$shipNumberCar','$storeID')");
    }

    function update_Shipper($shipName,$shipPhone,$shipNumberCar,$shipImage,$storeID){
        return $this->db->query("UPDATE shipper SET ShipName='$shipName' ,ShipNumberCar='$shipNumberCar',ShipImage='$shipImage',StoreID='$storeID' WHERE ShipPhone = $shipPhone ");
    }
    

    function getShipper($ShipID){
        $stmt = $this->conn->prepare("SELECT * FROM shipper WHERE ShipID = ?");
        $stmt->bind_param("s",$ShipID);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
    }
    
    public function loginRegisDevice($phone,$token){
        if(!$this->isPhoneExist($phone)){
            $stmt = $this->conn->prepare("INSERT INTO shipper (ShipPhone, Token,ShipImage) VALUES (?,?,'https://assets.webiconspng.com/uploads/2017/09/Avatar-PNG-Image-87443.png')");
            $stmt->bind_param("ss",$phone,$token);
            if($stmt->execute())
                return 0; 
            return 1; 
        }else{
            $stmt = $this->conn->prepare("UPDATE shipper SET Token = ? WHERE ShipPhone = ?");
            $stmt->bind_param("ss",$token,$phone);
            if($stmt->execute())
                return 2; 
            return 3; 
        }
    }

    private function isPhoneExist($phone){
        $stmt = $this->conn->prepare("SELECT ShipID FROM shipper WHERE ShipPhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    public function getItemShipper($phone){
        $stmt = $this->conn->prepare("SELECT * FROM shipper WHERE ShipPhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
    }

    public function getShipperName($phone){
        $stmt = $this->conn->prepare("SELECT * FROM shipper WHERE ShipPhone = ?");
        $stmt->bind_param("s",$phone);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
    }


    public function Update_Status($phone,$status){
        return $this->db->query("UPDATE  shipper SET Status='$status' WHERE ShipPhone ='$phone'"); 
    }

    public function UpdateLocationShip($phone,$shipLat,$shipLong){
        return $this->db->query("UPDATE  shipper SET ShipLat='$shipLat',ShipLong='$shipLong' WHERE ShipPhone ='$phone'"); 
    }

    public function getShip($shipID){
        $stmt = $this->conn->prepare("SELECT * FROM shipper WHERE ShipID = ?");
        $stmt->bind_param("s",$shipID);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
    }
}

?>
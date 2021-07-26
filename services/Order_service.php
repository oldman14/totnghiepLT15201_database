<?php
include '../db/DbConnect.php';
class OrderService
{
	public $db;
	private $conn;

	function __construct(){
		$this->db = new DbConnect();
        $this->conn = $this->db->connect();
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

	function getAllOrder($store, $status){
		return $this->db->select("SELECT * FROM `orderfood` INNER JOIN users
        ON `orderfood`.UserID = users.UserID WHERE StoreID = '$store' AND DATE(OrderDate) = DATE(NOW()) AND Status = '$status'  ORDER BY OrderDate");
	}

	function getAllOrder1($store){
		return $this->db->select("SELECT * FROM `orderfood` INNER JOIN users
        ON `orderfood`.UserID = users.UserID WHERE StoreID = '$store' AND DATE(OrderDate) = DATE(NOW()) AND Status='Đang đợi xác nhận' OR Status ='Cửa hàng đang chuẩn bị'   ORDER BY OrderDate");
	}

	function getAllOrder2($store){
		return $this->db->select("SELECT * FROM `orderfood` INNER JOIN users
        ON `orderfood`.UserID = users.UserID WHERE StoreID = '$store' AND DATE(OrderDate) = DATE(NOW()) ORDER BY OrderDate");
	}

	function order_update1($orderID, $Status, $message){
		return $this->db->query("UPDATE `orderfood` set Status='$Status', Note = '$message' WHERE orderID='$orderID'");
	}

	function order_update($orderID, $Status,$shipID, $message){
		return $this->db->query("UPDATE `orderfood` set Status='$Status', Note = '$message', ShipID = '$shipID' WHERE orderID='$orderID'");
	}
	
	function getItemOrder($shipID){
		return $this->db->select("SELECT * FROM orderfood WHERE ShipID ='$shipID'"); 
	}
	function updateStatus($orderID,$status){
		return $this->db->query("UPDATE  orderfood SET Status='$status' WHERE OrderID ='$orderID'"); 
	}
	public function getShipperViewUsers($userID){
        $stmt = $this->conn->prepare("SELECT * FROM orderfood WHERE UserID = ?");
        $stmt->bind_param("s",$userID);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result; 
    }
	function insertOderDetail($listItems){
		$detailOrder = $listItems['detailOrder'];
		$sql = ("INSERT INTO detailoder (OrderID, ProductID, Quantity, SizeID, Amount) VALUES (?,?,?,?,?)");
		$sqlOrder = ("INSERT INTO orderfood (OrderID, StoreID, Address, OrderLat, OrderLong, TotalMoney) VAlUES (?,?,?,?,?,?)");
		$OrderID = $listItems['orderID'];
		$StoreID = $listItems['storeID'];
		$Address =  $listItems['address'];
		$Lat = $listItems['lat'];
		$Lng = $listItems['lng'];
		$TotalMoney = $listItems['totalMoney'];
		$resultOrder = $this->db->query("INSERT INTO orderfood (OrderID, StoreID, Address, OrderLat, OrderLong, TotalMoney) VALUES('$OrderID', '$StoreID', '$Address','$Lat', '$Lng', '$TotalMoney')");
		if($resultOrder){
			$resultOrder1 = $this->db->select("SELECT * FROM orderfood WHERE OrderID = '$OrderID'");
		} else {
			$resultOrder1 = null;
		}
		if (( $stmt = $this->db->prepare($sql))) {
		 foreach($detailOrder as $item){ 
			$result = false;
			$stmt->bind_param("sssss", $listItems['orderID'],$item['productID'], $item['quantity'], $item['sizeID'], $item['amount']);
			if (!$stmt->execute()) {
				echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			} else {
				$result = true;
			}
		} 
	}
		return $result;
	}
}
	
?>
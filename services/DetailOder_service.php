<?php 
include '../db/DbConnect.php';
class DetailOderService
{
    public $db;
	
	function __construct(){
		$this->db = new DbConnect();
	}
    function getAll_shipper(){
        return $this->db->select("SELECT * FROM shipper");
    }
    function detailOder_insert($myArrays){
        foreach ($myArrays as $myArray){
            $oderID = $myArray['name'];
            $productID = $myArray['pass'];
            $this->db->query("INSERT INTO detailoder (OderID, ProductID) VALUES ('$oderID','$productID') ");
        }
        return true;
    }


    function getByOrderID($orderID){
        return $this->db->select("SELECT *  
        FROM detailoder
        INNER JOIN product
        ON detailoder.ProductID = product.ProductID INNER JOIN typeproduct ON product.TypeID = typeproduct.TypeID INNER JOIN size ON detailoder.SizeID = size.SizeID WHERE OrderID = '$orderID'");   
    }

    function getCountProduct(){
        $cart = array();
        $productListID = $this->db->select("SELECT ProductID,DetailID FROM detailoder GROUP BY ProductID ORDER BY SUM(Quantity) DESC LIMIT 2");
        for($i = 0; $i< count($productListID); $i++){
            $productID =  implode(" ",array_values($productListID[$i]));
            $result = $this->getProduct($productID);
            $item = $this->getSize($productID);
            $result["sizes"]= $item;
            array_push($cart,$result);
        }
        return $cart; 
    }

    function getProduct($productID){
        // return $this->db->select("SELECT * FROM product WHERE ProductID = '$productID'");
        $stmt = $this->conn->prepare("SELECT * FROM product WHERE ProductID = ?");
        $stmt->bind_param("s",$productID);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result;

    }

    function getSize($productID){
        return $this->db->select("SELECT * FROM size WHERE ProductID = '$productID'");
    }
}
?>
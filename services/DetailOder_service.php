<?php 
include '../db/DbConnect.php';
class DetailorderService
{
    public $db;
	
	function __construct(){
		$this->db = new DbConnect();
	}
    function getAll_shipper(){
        return $this->db->select("SELECT * FROM shipper");
    }
    function detailorder_insert($myArrays){
        foreach ($myArrays as $myArray){
            $orderID = $myArray['name'];
            $productID = $myArray['pass'];
            $this->db->query("INSERT INTO detailorder (orderID, ProductID) VALUES ('$orderID','$productID') ");
        }
        return true;
    }
    function getByOrderID($orderID){
        return $this->db->select("SELECT *  
        FROM detailoder
        INNER JOIN product
        ON detailoder.ProductID = product.ProductID INNER JOIN typeproduct ON product.TypeID = typeproduct.TypeID WHERE OrderID = '$orderID'");   
    }
}
?>
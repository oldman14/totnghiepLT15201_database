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
}
?>
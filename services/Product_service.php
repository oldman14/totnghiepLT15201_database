<?php
 require_once ('../db/DbConnect.php');
 require_once ('../entities/Product.php');
 
 class ProductService{
    private $db;
    function __construct()
    {
        $this->db = new DBConnect();
        $this->conn = $this->db->connect();
    }

    function getAll(){
        $cart = array();
        $productList = $this->db->select("SELECT * FROM product");
        $productListID = $this->db->select("SELECT ProductID FROM product");
        for($i = 0; $i< count($productListID); $i++){
            $productID =  implode(" ",array_values($productListID[$i]));
            $result = $this->getProduct($productID);
            $item = $this->getSize($productID);
            $result["sizes"]= $item;
            array_push($cart,$result);
        }
        return $cart; 
    }

    function add_Product($productName,$productPrice,$productImage,$productNote,$typeID){
        if(!$this->checkExist($productName)){
            $insert=$this->db->query("INSERT INTO product(ProductName,ProductPrice,ProductImage,ProductNote,TypeID) VALUES ('$productName','$productPrice','$productImage','$productNote','$typeID')");
            if($insert ==1){
                $product = $this->getProductID($productName);
                $productID =  implode(" ",$product);
                $store = $this->db->select("SELECT StoreID FROM store");
                for($i = 0; $i< count($store); $i++){
                    // echo json_encode(array_values($store[$i]));
                    $storeID =  implode(" ",array_values($store[$i]));
                    $this->addListProduct($productID,$storeID);
                }
                return 1;
            }
        return 0;
        }
        return 4;
    }

    function update_Product($productID,$productName,$productPrice,$productImage,$productNote,$typeID){
        return $this->db->query("UPDATE product SET ProductName='$productName',ProductPrice='$productPrice',ProductImage='$productImage',ProductNote='$productNote',TypeID='$typeID' WHERE ProductID='$productID'");
    }

    function getProductID($productName){
        $stmt = $this->conn->prepare("SELECT ProductID FROM product WHERE ProductName=?");
        $stmt->bind_param("s",$productName);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return array($result['ProductID']);    
    }

    function addListProduct($productID, $storeID){
        return $this->db->query("INSERT INTO listproduct(ProductID, StoreID) VALUES ('$productID','$storeID')");
    }

<<<<<<< HEAD
    function checkExist($productName){
        $stmt = $this->conn->prepare("SELECT ProductID FROM product WHERE ProductName = ?");
        $stmt->bind_param("s",$productName);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
=======
    function getProduct($productID){
        $stmt = $this->conn->prepare("SELECT * FROM product WHERE ProductID = ?");
        $stmt->bind_param("s",$productID);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
        // $sql= "SELECT * FROM product WHERE ProductID = '$productID'";
        // $result = $this->conn->query($sql);
        // $row =  $result->fetch_assoc();
        // return  $row;


    }
    function getSize($productID){
        return $this->db->select("SELECT * FROM size WHERE ProductID = '$productID'");
>>>>>>> origin/tuyen2k1
    }
 }

?>
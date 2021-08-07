<?php
 require_once ('../db/DbConnect.php');
 require_once ('../entities/Product.php');
 
 class FavoriteService{
	public $db;
	private $conn;
        function __construct()
    {
        $this->db = new DBConnect();
        $this->conn = $this->db->connect();
    }

    function addFavorite($userID,$productID){
        if($this->db->query("INSERT INTO favorite(UserID, ProductID) VALUES ('$userID','$productID')")){
            return $this->db->select("SELECT * from favorite where UserID = '$userID' ");
        }
        return null;
    }

    function getFavorite($userID){
        return $result = $this->db->select("SELECT * from favorite where UserID = '$userID'");
    }
    function delete_favorite($userID,$productID){
        return $this->db->query("DELETE FROM favorite WHERE UserID='$userID' and ProductID='$productID'");
    }
 }

?>
<?php
include ('../db/DbConnect.php');

class TypeProduct{
	
    public $db;

    function __construct(){
        $this->db = new DBConnect();
        $this->conn = $this->db->connect();
    }

    function getAll(){
        return $this->db->select("SELECT * FROM typeproduct");
    }

    function update($typeID, $typeName, $typeNote){
        return $this->db->query("UPDATE typeproduct SET TypeName = '$typeName',TypeNote= '$typeNote' WHERE TypeID = '$typeID'");
        
    }

    function insert($typeName, $typeNote){
        if(!$this->checkType($typeName)){
            $insert = $this->db->query("INSERT INTO typeproduct (TypeName,TypeNote) VALUES ('$typeName', '$typeNote') ");
            if($insert == 1){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 2;
        }
    }

    function checkType($typeName){
        $stmt = $this->conn->prepare("SELECT typeID FROM typeproduct WHERE TypeName = ?");
        $stmt->bind_param("s",$typeName);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }
    
}
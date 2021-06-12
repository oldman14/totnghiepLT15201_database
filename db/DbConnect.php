<?php
require_once ('../db_config.php');

class DBConnect{

    private $conn;
    function connect(){
        //connect database
            
        $this ->conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
        if($this->conn -> connect_error){
            die("Connection failed: " .$this->conn->connect_error);
        }
        //Thêm xóa cũng được k xóa cũng k sao
        return $this->conn;
    }

    function query($sql){
        $this->connect();
        $result=$this->conn->query($sql);
        if($result === FALSE){
            echo "Error: ".$sql."<br>".$this->conn->error;
        }
        $this->close();
        return $result;
    }

    function multi_query($sql){
        $this->connect();
        $result =$this->conn->multi_query($sql);
        if($result === FALSE){
            echo "Error: ".$sql ."<br>".$this->conn->error;
        }
        $this->close();
        return $result;
    }

    function select($sql){
		$this->connect();
		$result = $this->conn->query($sql);
		$data = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($data,$row);
			}
		} 
		$this->close();
		return  $data;
	}

    function close(){
        mysqli_close($this->conn);
    }
}
?>
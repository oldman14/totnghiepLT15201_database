<?php 
include ('../db_config.php');
class DbConnect
{
    private $conn;
 
    function __construct()  
    {

    }
 
    function connect()
    {
 
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
 
        return $this->conn;
    }
	function prepare($sql){
		$result = $this->conn->prepare($sql);
		if ( $result=== FALSE) {
			echo "Error: " . $sql . "<br>" . $this->conn->error;
		} 
		return $result;
	}
    function query($sql){
		$result = $this->conn->query($sql);
		if ( $result=== FALSE) {
			echo "Error: " . $sql . "<br>" . $this->conn->error;
		} 
		return  $result;
	}
	
	function multi_query($sql)
	{
		$result = $this->conn->multi_query($sql);
		if ( $result=== FALSE) {
			echo "Error: " . $sql . "<br>" . $this->conn->error;
		}
		return  $result;
		
	}
	
	function select($sql){
		$result = $this->conn->query($sql);
		$data = array();
		if ($result !== false && $result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($data,$row);
			}
		} 
		return  $data;
	}

	function select_one($sql){
		$result = $this->conn->query($sql);
		$row = $result->fetch_assoc();
		return $row;
	}

	
	function close(){
		mysqli_close($this->conn);
	}
 
}
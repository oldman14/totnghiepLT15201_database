<?php
include '../db_config.php';

class DBConnect{
	private $conn;
	function connect(){
		$this->conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
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
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($data,$row);
			}
		} 
		return  $data;
	}
	// function insert($sql){
	// 	$this->connect();
	// 	$result = $this->conn->query($sql);
	// 	echo ($result);
	// }
	function close(){
		mysqli_close($this->conn);
	}
	//abc123ádasdasdads
}
?>
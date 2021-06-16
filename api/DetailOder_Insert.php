<?php
include '../services/Detailoder_service.php';
$service = new DetailorderService();
$service->db->connect();    
$myArrays = array();
class Detail{
    public $name;
    public $pass;
}
$myObject = new Detail();   
$myArrays = $_POST['myArray'];
$result = $service->detailorder_insert($myArrays);
$response["Detailorder"] = $result;
echo json_encode($response);
$service->db->close();
?>
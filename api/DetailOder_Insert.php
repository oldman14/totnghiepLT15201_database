<?php
include '../servcies/DetailOder_service.php';
$service = new DetailOderService();
$service->db->connect();    
$myArrays = array();
class Detail{
    public $name;
    public $pass;
}
$myObject = new Detail();   
$myArrays = $_POST['myArray'];
$result = $service->detailOder_insert($myArrays);
$response["DetailOder"] = $result;
echo json_encode($response);
$service->db->close();
?>
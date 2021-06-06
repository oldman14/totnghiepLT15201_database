<?php
include ('../services/TypeProduct_services.php');
$service = new TypeProduct();
$service->db->connect();
$typeName = $_POST['typeName'];
$typeNote = $_POST['typeNote'];
$response = json_encode($service->insert($typeName, $typeNote));
if($response==1){
    echo "Insert Success!";
}else if($response==2){
    echo "TypeProduct is exits!";
}else{
    echo "Insert Fail!";
}
$service->db->close();
?>
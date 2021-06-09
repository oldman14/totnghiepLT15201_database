<?php
include '../services/Shipper_service.php';
$service = new ShipperService();
$service->db->connect();    
// if (isset($_POST['ShipName']) && isset($_POST['ShipImage']) && isset($_POST['ShipPhone']) &&isset($_POST['ShipNumberCar'])&&isset($_POST['Status']))) {
    $ShipName = $_POST['ShipName'];
    $ShipImage = $_POST['ShipImage'];
    $ShipPhone = $_POST['ShipPhone'];
    $ShipNumberCar = $_POST['ShipNumberCar'];
    $ShipLat = $_POST['ShipLat'];
    $ShipLong = $_POST['ShipLong'];
    $Status = $_POST['Status'];
    $Token = $_POST['Token'];
    
    // $sql = "INSERT INTO oder (UserID, StoreID,ShipperID, CouponID, TotalMoney, Status) VALUES('$UserID', '$StoreID', '$ShipperID','$CouponID', $TotalMoney, $Status)";
    // check if row inserted or not

    $result = $service->shipper_insert($ShipName, $ShipImage, $ShipPhone,$ShipNumberCar, $ShipLat, $ShipLong, $Status, $Token);
    $response["shipper"] = $result;
    echo json_encode($response);
// } 
$service->db->close();
?>
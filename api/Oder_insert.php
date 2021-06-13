<?php
    include '../services/oder_service.php';
    $service = new OderService();
    $service->db->connect();    
    if (isset($_POST['UserID']) && isset($_POST['StoreID']) && isset($_POST['ShipperID']) &&isset($_POST['CouponID'])&&isset($_POST['TotalMoney'])&&isset($_POST['Note'])&&isset($_POST['Status'])) {
        $UserID = $_POST['UserID'];
        $StoreID = $_POST['StoreID'];
        $CouponID = $_POST['CouponID'];
        $ShipperID = $_POST['ShipperID'];
        $TotalMoney = $_POST['TotalMoney'];
        $Note = $_POST['Note'];
        $Status = $_POST['Status'];

        $result = $service->oder_insert($UserID, $StoreID, $ShipperID,$CouponID, $TotalMoney,$Note, $Status);
        $response["oder"] = $result;
        echo json_encode($response);
    }   
    $service->db->close();
?>
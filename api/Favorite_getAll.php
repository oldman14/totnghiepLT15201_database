<?php
    include '../services/Favorite_service.php';
    $service = new FavoriteService();
    $service->db->connect();    
    if (isset($_POST['UserID'])) {
        $UserID = $_POST['UserID'];
        $result = $service->getFavorite($UserID);
        $response["favorites"] = $result;
        echo json_encode($response);
    }   
    $service->db->close();
?>
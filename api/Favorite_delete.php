<?php
    include '../services/Favorite_service.php';
    $service = new FavoriteService();
    $service->db->connect();    
    if (isset($_POST['UserID']) && isset($_POST['ProductID']) ) {
        $UserID = $_POST['UserID'];
        $ProductID = $_POST['ProductID'];
        $result = $service->delete_favorite($UserID,$ProductID);
        echo json_encode(true);
    }   
    $service->db->close();
?>
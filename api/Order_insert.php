<?php
    include ('../services/Order_service.php');
    $service=new OrderService();
    // $listItems = json_decode($_POST['orderfood'], true);// này là post list gì lên á a này a run lên đi 
    $listItems = json_decode($_POST['orderfood'], true);// chỗ này nè bên kia a convert ra json màokder em xem e thế
    $result = $service->insertOderDetail($listItems);
    echo json_encode($result);
   ?>
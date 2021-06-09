<?php
 include ('../services/Product_service.php');
 $service=new ProductService();
 echo json_encode(array("products"=>$service->getAll_Product()));

?>
<?php
include ('../services/ListProduct_service.php');
$service=new ListProductService();
echo json_encode(array("LisrPro"=>$service->getAll_ListPro()));

?>
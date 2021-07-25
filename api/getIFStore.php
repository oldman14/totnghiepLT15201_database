<?php
 include ('../services/Store_services.php');
 $service=new StoreServices();
 $storeID=$_POST['StoreID'];
 echo json_encode($service->getIFStore($storeID));
?>
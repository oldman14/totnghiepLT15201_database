<?php
 include ('../services/DetailOder_service.php');
 $service=new DetailOderService();
 $service->db->connect();
 echo json_encode(array("Counts"=>$service->getCountProduct()));

?>
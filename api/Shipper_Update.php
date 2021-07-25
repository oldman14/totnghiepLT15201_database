<?php
 include ('../services/Shipper_service.php');
 $service=new ShipperService();
 $shipPhone=$_POST['ShipPhone'];
 $shipName=$_POST['ShipName'];
 $shipNumberCar =$_POST['ShipNumberCar'];
 $shipLat=$_POST['ShipLat'];
 $shipImage=$_POST['ShipImage'];
 $shipLong=$_POST['ShipLong'];
 $status=$_POST['Status'];
 $result = $service->update_Shipper($shipPhone,$shipName,$shipNumberCar,$shipLat,$shipImage,$shipLong,$status);
 if($result == true){
    $response['error'] = false; 
    $response['message'] = 'Update Success!';
}else{
    $response['error'] = true;
    $response['message']='Error, please try again!';
}
echo json_encode($response);


?>
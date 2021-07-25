<?php
include('../services/Coupon_Service.php');
$service = new CouponService();
$status=$_POST['Status'];
echo json_encode(array("Coupons"=>$service->get_Coupon($status)));
?>
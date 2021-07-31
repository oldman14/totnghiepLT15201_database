<?php
  include '../services/Coupon_Service.php';
  $service = new CouponService();
  echo json_encode(array("Coupon"=>$service->getAll1()));
?>
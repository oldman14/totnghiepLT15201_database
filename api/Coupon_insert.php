<?php
  include '../services/Coupon_Service.php';
  $service=new CouponService();
  $CouponImage= $_POST['CouponImage'];
  $DateStart=$_POST['DateStart'];
  $DateEnd=$_POST['DateEnd'];
  $CouponNote=$_POST['CouponNote'];
  $CouponCondition=$_POST['CouponCondition'];
  $CouponPrice=$_POST['CouponPrice'];
  $Status=$_POST['Status'];
  echo json_encode($service->insert($CouponImage,$DateStart,$DateEnd,$CouponNote,$CouponCondition,$CouponPrice,$Status));

?>
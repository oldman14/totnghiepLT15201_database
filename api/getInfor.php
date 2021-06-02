<?php

include ('../services/DbOperation.php');


$phone = $_POST['phone'];

$db = new DbOperation(); 

$result = $db->getuser($phone);

echo json_encode($result);
?>
<?php
include ('../services/DbOperation.php');
$db = new DbOperation();
$devicetoken = $db->getTokenByEmail($_POST['phone']);
foreach ($devicetoken as &$value) {
    echo $value;
}
?>  
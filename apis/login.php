<?php
include 'sales_tracker.php';
$sa_tr = new Sales_tracker();
$login = $_REQUEST;
$loginResponse = $sa_tr -> login($login);
echo json_encode($loginResponse,JSON_PRETTY_PRINT);
?>
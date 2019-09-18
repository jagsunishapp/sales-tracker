<?php
include 'sales_tracker.php';
$sa_tr = new Sales_tracker();
$attend = $_REQUEST;
$attendResponse = $sa_tr -> punch_out($attend);
echo json_encode($attendResponse,JSON_PRETTY_PRINT);
?>
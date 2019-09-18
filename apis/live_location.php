<?php
include 'sales_tracker.php';
$sa_tr = new Sales_tracker();
$travel = $_REQUEST;
$travelResponse = $sa_tr -> live_location($travel);
echo json_encode($travelResponse,JSON_PRETTY_PRINT);
?>
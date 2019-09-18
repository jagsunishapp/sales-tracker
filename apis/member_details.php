<?php
include 'sales_tracker.php';
$sa_tr = new Sales_tracker();
$mem_det = $_REQUEST;
$mem_detResponse = $sa_tr -> member_details($mem_det);
echo json_encode($mem_detResponse,JSON_PRETTY_PRINT);
?>
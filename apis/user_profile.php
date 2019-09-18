<?php
include 'sales_tracker.php';
$sa_tr = new Sales_tracker();
$profile = $_REQUEST;
$profileResponse = $sa_tr -> user_profile($profile);
echo json_encode($profileResponse,JSON_PRETTY_PRINT);
?>
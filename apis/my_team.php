<?php
include 'sales_tracker.php';
$sa_tr = new Sales_tracker();
$my_team = $_REQUEST;
$my_teamResponse = $sa_tr -> myteam($my_team);
echo json_encode($my_teamResponse,JSON_PRETTY_PRINT);
?>
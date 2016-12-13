<?php

date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/emergency.php";
$obj = new Emergency();
$dateNow = date("d", strtotime(date("Y-m-d")));

$user_id = $_REQUEST["user_id"];
$rows = $obj->read(" user_id = {$user_id} ");

$resultArray = array();
if ($rows != false) {
    foreach ($rows as $row) {
        //$row = $rows[0];						
        $arrCol = array();
        $arrCol["emergency_id"] = $row["emergency_id"];
        $arrCol["emergency_name"] = $row["emergency_name"];
        $arrCol["emergency_mobile"] = $row["emergency_mobile"];
        $arrCol["emergency_image"] = $row["emergency_image"];
        $arrCol["user_id"] = $row["user_id"];
        array_push($resultArray, $arrCol);
    }
}

echo json_encode($resultArray);

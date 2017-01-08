<?php

date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/emergencyPhone.php";
$obj = new EmergencyPhone();
$dateNow = date("d", strtotime(date("Y-m-d")));

//$user_id = $_REQUEST["user_id"];
$rows = $obj->read();

$resultArray = array();
if ($rows != false) {
    foreach ($rows as $row) {
        //$row = $rows[0];						
        $arrCol = array();
        $arrCol["id"] = $row["id"];
        $arrCol["image"] = $row["image"];
        $arrCol["mobile"] = $row["mobile"]; 
        $arrCol["timestamp"] = $row["timestamp"];
        array_push($resultArray, $arrCol);
    }
}

echo json_encode($resultArray);

<?php

date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/emergency.php";
$obj = new Emergency();
$dateNow = date("d", strtotime(date("Y-m-d")));

$user_id = 13;
$rows = $obj->read(" user_id = {$user_id} ");

$resultArray = array();
if ($rows != false) {
    foreach ($rows as $row) {
        //$row = $rows[0];						
        $arrCol = array();
        $arrCol["id"] = $row["emergency_id"];
        $arrCol["name"] = $row["emergency_name"];
        $arrCol["image"] = $row["emergency_image"];
        $arrCol["status"] = $row["emergency_mobile"];       
        $arrCol["profilePic"] = $row["emergency_image"];
        $arrCol["timeStamp"] = $row["timestamp"];
        $arrCol["url"] = NULL;
        array_push($resultArray, $arrCol);
    }
}

echo json_encode($resultArray);

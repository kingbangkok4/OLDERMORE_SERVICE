<?php

date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/knowledge.php";
$obj = new Knowledge();
//$dateNow = date("d", strtotime(date("Y-m-d")));
$status = $_REQUEST["status"];
$rows = $obj->read(" status LIKE '%{$status}%' ");

$resultArray = array();
if ($rows != false) {
    foreach ($rows as $row) {
        //$row = $rows[0];						
        $arrCol = array();
        $arrCol["id"] = $row["id"];
        $arrCol["name"] = "สาระน่ารู้";
        $arrCol["image"] = $row["image"];
        $arrCol["status"] = $row["status"];       
        $arrCol["profilePic"] = "knowledge.png";
        $arrCol["timeStamp"] = $row["timeStamp"];
        $arrCol["url"] = $row["url"];
        array_push($resultArray, $arrCol);
    }
}

echo json_encode($resultArray);

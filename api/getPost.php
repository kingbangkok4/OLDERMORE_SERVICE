<?php

date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/post.php";
$obj = new Post();
$dateNow = date("d", strtotime(date("Y-m-d")));

$rows = $obj->read(" f.user_id = {$_REQUEST["user_id"]} ");

$resultArray = array();
if ($rows != false) {
    foreach ($rows as $row) {
        //$row = $rows[0];						
        $arrCol = array();
        $arrCol["id"] = $row["id"];
        $arrCol["name"] = $row["member_name"];
        $arrCol["image"] = $row["image"];
        $arrCol["status"] = $row["status"];       
        $arrCol["profilePic"] = $row["user_image"];
        $arrCol["timeStamp"] = $row["timeStamp"];
        $arrCol["url"] = $row["url"];
        array_push($resultArray, $arrCol);
    }
}

echo json_encode($resultArray);

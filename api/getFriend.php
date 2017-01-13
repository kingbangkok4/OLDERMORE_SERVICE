<?php

date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/friend.php";
$obj = new Friend();
//$dateNow = date("d", strtotime(date("Y-m-d")));
 
//$user_id = 13;
$user_id = $_REQUEST["user_id"];
$friend = $_REQUEST["friend"];
$search = $_REQUEST["search"];
$rows = $obj->read(" f.user_id = {$user_id} AND f.friend_id <> {$user_id} AND m.member_name LIKE '%{$search}%' ");

$resultArray = array();
if ($rows != false) {
    foreach ($rows as $row) {
        //$row = $rows[0];			
        $arrCol = array();
        $arrCol["id"] = $row["id"];
        $arrCol["friend_id"] = $row["friend_id"];
        $arrCol["user_image"] = $row["user_image"];
        $arrCol["member_name"] = $row["member_name"];
        array_push($resultArray, $arrCol);
    }
}

echo json_encode($resultArray);
 
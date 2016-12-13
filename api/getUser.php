<?php

date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/user.php";
$obj = new User();
$dateNow = date("d", strtotime(date("Y-m-d")));

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$rows = $obj->read(" username = '{$username}' AND password = '{$password}' ");

$resultArray = array();

if ($rows != false) {
    //foreach ($rows as $row) {
    $row = $rows[0];

    //echo ($row["user_id"]);

    $arrCol = array();
    $arrCol["user_id"] = $row["user_id"];
    $arrCol["username"] = $row["username"];
    $arrCol["password"] = $row["password"];
    $arrCol["user_image"] = $row["user_image"];
    $arrCol["type"] = $row["type"];

    $arrCol["status"] = "1";
    $arrCol["error"] = "";

    array_push($resultArray, $arrCol);
    //}
} else {
    $arrCol = array();

    $arrCol["user_id"] = "";
    $arrCol["username"] = "";
    $arrCol["password"] = "";
    $arrCol["license_plate"] = "";
    $arrCol["user_image"] = "";
    $arrCol["type"] = "";

    $arrCol["status"] = "0";
    $arrCol["error"] = "ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง";

    array_push($resultArray, $arrCol);
}

echo json_encode($resultArray);

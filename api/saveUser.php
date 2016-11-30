<?php
header('Content-Type: text/html; charset=utf-8');
//date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/user.php";
$obj = new User();
//$dateNow = date("d",strtotime(date("Y-m-d")));

$data = array(
    "username" => $_REQUEST["username"],
    "password" => $_REQUEST["password"],
    "user_image" => "",
    "type" => "USER"
);

$resultArray = array();

$userID = $obj->insert($data);

$arrCol = array();
$arrCol["user_id"] = $userID;

array_push($resultArray,$arrCol);	

echo json_encode($resultArray);


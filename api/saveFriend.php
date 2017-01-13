<?php
header('Content-Type: text/html; charset=utf-8');
//date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/friend.php";
$obj = new Friend();
//$dateNow = date("d",strtotime(date("Y-m-d")));

$data_user = array(
    "user_id" => $_REQUEST["user_id"],
    "friend_id" => $_REQUEST["friend_id"]
);
$status = $obj->insert($data_user);

$data_friend = array(
    "user_id" => $_REQUEST["friend_id"],
    "friend_id" => $_REQUEST["user_id"]
);
$status = $obj->insert($data_friend);

$resultArray = array();
if ($status == true) {
    $arrCol = array();
    $arrCol["status"] = "บันทึกสำเร็จ";
    array_push($resultArray,$arrCol);
}else{
    $arrCol = array();
    $arrCol["status"] = "บันทึกไม่สำเร็จ เกิดข้อผิดพลาด !";
    array_push($resultArray,$arrCol);
}	
echo json_encode($resultArray);

<?php
header('Content-Type: text/html; charset=utf-8');
//date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/chat.php";
$obj = new Chat();
//$dateNow = date("d",strtotime(date("Y-m-d")));
$resultArray = array();

$data = array(
    "user_id" => $_REQUEST["user_id"],
    "friend_id" => $_REQUEST["friend_id"],
    "message" => $_REQUEST["message"]
);
$status = $obj->insert($data);

if ($status == true) {
    $arrCol = array();
    $arrCol["status"] = "1";
    $arrCol["error"] = "บันทึกสำเร็จ";
    array_push($resultArray,$arrCol);
}else{
    $arrCol = array();
    $arrCol["status"] = "0";
    $arrCol["error"] = "บันทึกไม่สำเร็จ เกิดข้อผิดพลาด !";
    array_push($resultArray,$arrCol);
}
    
echo json_encode($resultArray);

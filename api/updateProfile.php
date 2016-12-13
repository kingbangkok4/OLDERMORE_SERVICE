<?php

header('Content-Type: text/html; charset=utf-8');
//date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/member.php";
include "../model/user.php";
$objM = new Member();
$objU = new User();
//$dateNow = date("d",strtotime(date("Y-m-d")));

$data = array(
    "member_name" => $_REQUEST["member_name"],
    "member_mobile" => $_REQUEST["member_mobile"],
    "user_id" => $_REQUEST["user_id"],
    "user_image" => $_REQUEST["user_image"]
);
$status = true;
$status = $objM->update("member_name = '{$data["member_name"]}', member_mobile = '{$data["member_mobile"]}'", " user_id = {$data["user_id"]} ");
if($data["user_image"] != ""){
    $status = $objU->update("user_image = '{$data["user_image"]}'", " user_id = {$data["user_id"]} ");
}

$resultArray = array();
if ($status == true) {
    $arrCol = array();
    $arrCol["status"] = "1";
    $arrCol["error"] = "บันทึกสำเร็จ";
    array_push($resultArray, $arrCol);
} else {
    $arrCol = array();
    $arrCol["status"] = "0";
    $arrCol["error"] = "บันทึกไม่สำเร็จ เกิดข้อผิดพลาด !";
    array_push($resultArray, $arrCol);
}
echo json_encode($resultArray);
?>
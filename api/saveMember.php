<?php
header('Content-Type: text/html; charset=utf-8');
//date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/member.php";
$obj = new Member();
//$dateNow = date("d",strtotime(date("Y-m-d")));

$data = array(
    "member_name" => $_REQUEST["name"],
    "member_email" => $_REQUEST["email"],
    "member_mobile" => $_REQUEST["mobile"],
    "member_address" => $_REQUEST["address"],
    "user_id" => $_REQUEST["user_id"]
);

$status = $obj->insert($data);

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

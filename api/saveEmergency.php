<?php
header('Content-Type: text/html; charset=utf-8');
//date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/emergency.php";
$obj = new Emergency();
$resultArray = array();
//$dateNow = date("d",strtotime(date("Y-m-d")));

$data = array(
    "emergency_name" => $_REQUEST["emergency_name"],
    "emergency_mobile" => $_REQUEST["emergency_mobile"],
    "emergency_image" => $_REQUEST["emergency_image"],
    "user_id" => $_REQUEST["user_id"]
);
$rows = $obj->read(" emergency_name = '{$data["emergency_name"]}' ");
if ($rows == false) {
    $status = $obj->insert($data);
}else{
    if($data["emergency_name"] != ""){
        $status = $obj->update(" SET emergency_name = '{$data["emergency_name"]}', "
        . "emergency_mobile = '{$data["emergency_mobile"]}', "
        . "emergency_image = '{$data["emergency_image"]}', "
        . "user_id = '{$data["user_id"]}' ");
    }else{
        $status = $obj->update(" SET emergency_name = '{$data["emergency_name"]}', "
        . "emergency_mobile = '{$data["emergency_mobile"]}', "
        . "user_id = '{$data["user_id"]}' ");
    }   
}

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

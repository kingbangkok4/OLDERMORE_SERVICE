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
    "emergency_id" => $_REQUEST["emergency_id"],
    "user_id" => $_REQUEST["user_id"]
);

 $status = $obj->delete($data);

if ($status == true) {
    $arrCol = array();
    $arrCol["status"] = "1";
    $arrCol["error"] = "บันทึกสำเร็จ";
    // $arrCol["error"] = $status;
    array_push($resultArray,$arrCol);
}else{
    $arrCol = array();
    $arrCol["status"] = "0";
    $arrCol["error"] = "บันทึกไม่สำเร็จ เกิดข้อผิดพลาด !";
    //$arrCol["error"] = $status;
    array_push($resultArray,$arrCol);
}	
echo json_encode($resultArray);

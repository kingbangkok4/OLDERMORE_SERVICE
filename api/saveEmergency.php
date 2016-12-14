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
    "emergency_name" => $_REQUEST["emergency_name"],
    "emergency_mobile" => $_REQUEST["emergency_mobile"],
    "emergency_image" => $_REQUEST["emergency_image"],
    "user_id" => $_REQUEST["user_id"]
);

if($data["emergency_id"] == ""){
    $status = $obj->insert($data);
}
else{
    if($data["emergency_image"] != ""){
        $status = $obj->update(" emergency_name = '{$data["emergency_name"]}', "
        . "emergency_mobile = '{$data["emergency_mobile"]}', "
        . "emergency_image = '{$data["emergency_image"]}' "
        , " emergency_id = {$data["emergency_id"]} ");
    }else{
        $status = $obj->update(" emergency_name = '{$data["emergency_name"]}', " 
        . "emergency_mobile = '{$data["emergency_mobile"]}' " 
        , " emergency_id = {$data["emergency_id"]} ");
    }   
}

/*$rows = $obj->read(" emergency_name = '{$data["emergency_name"]}' ");
if ($rows == false) {
    
}else{ 
    
}*/

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

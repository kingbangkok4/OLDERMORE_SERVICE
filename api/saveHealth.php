<?php

header('Content-Type: text/html; charset=utf-8');
//date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/health.php";
$obj = new Health();
$resultArray = array();
//$dateNow = date("d",strtotime(date("Y-m-d")));

$data = array(
    "health_id" => $_REQUEST["health_id"],
    "con_disease" => $_REQUEST["con_disease"],
    "drug_allergy" => $_REQUEST["drug_allergy"],
    "doctor" => $_REQUEST["doctor"],
    "doctor_mobile" => $_REQUEST["doctor_mobile"],
    "hotel" => $_REQUEST["hotel"],
    "hotel_mobile" => $_REQUEST["hotel_mobile"],
    "user_id" => $_REQUEST["user_id"]
);

if ($data["health_id"] == "") {
    $status = $obj->insert($data);   
    
    //echo "insert : ".$status."<br/>";
} else {
    $status = $obj->update(" con_disease = '{$data["con_disease"]}', "
    . "con_disease = '{$data["con_disease"]}', "
    . "drug_allergy = '{$data["drug_allergy"]}', "
    . "doctor = '{$data["doctor"]}', "
    . "doctor_mobile = '{$data["doctor_mobile"]}', "
    . "hotel = '{$data["hotel"]}', "
    . "hotel_mobile = '{$data["hotel_mobile"]}' "
    , " health_id = {$data["health_id"]} ");
    
    //echo "update : ".$status."<br/>";
}

/* $rows = $obj->read(" emergency_name = '{$data["emergency_name"]}' ");
  if ($rows == false) {

  }else{

  } */

if ($status == true) {
    $arrCol = array();
    $arrCol["status"] = "1";
    $arrCol["error"] = "บันทึกสำเร็จ";
    // $arrCol["error"] = $status;
    array_push($resultArray, $arrCol);
} else {
    $arrCol = array();
    $arrCol["status"] = "0";
    $arrCol["error"] = "บันทึกไม่สำเร็จ เกิดข้อผิดพลาด !";
    //$arrCol["error"] = $status;
    array_push($resultArray, $arrCol);
}
echo json_encode($resultArray);

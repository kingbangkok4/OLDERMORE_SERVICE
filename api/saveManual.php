<?php
date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/manual.php";
$obj = new Manual();
$dateNow = date("d",strtotime(date("Y-m-d")));
$resultArray = array();

$data = array(
    "manual_id" => $_REQUEST["manual_id"],
    "manual_video" => $_REQUEST["manual_video"],
    "manual_word" => $_REQUEST["manual_word"]
);

if ($data["manual_id"] == "") {
   $status = $obj->insert($data);       
    //echo "insert : ".$status."<br/>";
} else {
    if($data["manual_video"] != "" && $data["manual_word"] != ""){
        $status = $obj->update(" manual_video = '{$data["manual_video"]}', manual_word = '{$data["manual_word"]}' ", " 1=1 ");
    }else if($data["manual_video"] != "" && $data["manual_word"] == ""){
        $status = $obj->update(" manual_video = '{$data["manual_video"]}' ", " 1=1 ");
    }else if($data["manual_video"] == "" && $data["manual_word"] != ""){
        $status = $obj->update(" manual_word = '{$data["manual_word"]}' ", " 1=1 ");
    }else{
        $status = false;
    }       
    //echo "update : ".$status."<br/>";
}

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

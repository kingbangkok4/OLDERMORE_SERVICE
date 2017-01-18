<?php
header('Content-Type: text/html; charset=utf-8');
//date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/friend.php";
$obj = new Friend();
//$dateNow = date("d",strtotime(date("Y-m-d")));
$resultArray = array();
    $friend_id = $_REQUEST["friend_id"];
    $favorite = $_REQUEST["favorite"];
    $status = $obj->update(" favorite = {$favorite} ", " id = {$friend_id} ");
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

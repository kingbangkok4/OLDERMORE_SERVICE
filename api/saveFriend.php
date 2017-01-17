<?php
header('Content-Type: text/html; charset=utf-8');
//date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/friend.php";
$obj = new Friend();
//$dateNow = date("d",strtotime(date("Y-m-d")));
$rows = $obj->read(" f.user_id = {$_REQUEST["user_id"]} AND f.friend_id = {$_REQUEST["friend_id"]} ");
$resultArray = array();
if ($rows == false) {
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
}  else {
     $arrCol = array();
     $arrCol["status"] = "0";
     $arrCol["error"] = "คุณมีเพื่อนคนนี้อยู่แล้ว";
     array_push($resultArray,$arrCol);
}
	
echo json_encode($resultArray);

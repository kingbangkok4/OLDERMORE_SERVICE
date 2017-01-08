<?php
header('Content-Type: text/html; charset=utf-8');
//date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/user.php";
include "../model/friend.php";
$obj = new User();
$objFriend = new Friend();
//$dateNow = date("d",strtotime(date("Y-m-d")));

$data = array(
    "username" => $_REQUEST["username"],
    "password" => $_REQUEST["password"],
    "user_image" => "",
    "type" => "USER"
);

$resultArray = array();

$userID = $obj->insert($data);

if($userID > 0){
    $data_friend = array(
        "user_id" => $userID,
        "friend_id" => $userID
    );
    $objFriend->insert($data_friend);
}

$arrCol = array();
$arrCol["user_id"] = $userID;

array_push($resultArray,$arrCol);	

echo json_encode($resultArray);


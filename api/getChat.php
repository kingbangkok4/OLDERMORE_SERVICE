<?php
date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/chat.php";
$obj = new Chat();
$dateNow = date("d",strtotime(date("Y-m-d")));

$user_id = $_REQUEST["user_id"];
$friend_id = $_REQUEST["friend_id"];
$last_id = $_REQUEST["last_id"];

$rows = $obj->read(" ((c.user_id = {$user_id} AND c.friend_id = {$friend_id}) "
. "  OR (c.user_id = {$friend_id} AND c.friend_id = {$user_id})) "
. " AND c.id > {$last_id} ");
//echo $rows;
$resultArray = array();

	if ($rows != false) {
         foreach ($rows as $row) {		
            $arrCol = array();
            $arrCol["id"] = $row["id"];
            $arrCol["user_id"] = $row["user_id"];
            $arrCol["message"] = $row["message"];
            $arrCol["user_image"] = $row["user_image"];	
            $arrCol["member_name"] = $row["member_name"];
            $arrCol["member_mobile"] = $row["member_mobile"];            	    
	    array_push($resultArray,$arrCol);
	}
      }
	
echo json_encode($resultArray);

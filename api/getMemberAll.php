<?php
date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/member.php";
$obj = new Member();
$dateNow = date("d",strtotime(date("Y-m-d")));

$user_id = $_REQUEST["user_id"];
$search = $_REQUEST["search"];

$rows = $obj->read(" u.user_id <> {$user_id} AND u.type <> 'ADMIN' AND m.member_name LIKE '%{$search}%' ");

$resultArray = array();

	if ($rows != false) {
         foreach ($rows as $row) {		
            $arrCol = array();
            $arrCol["member_id"] = $row["member_id"];
            $arrCol["user_id"] = $row["user_id"];
            $arrCol["member_name"] = $row["member_name"];
            $arrCol["member_mobile"] = $row["member_mobile"];
            $arrCol["member_address"] = $row["member_address"];
            $arrCol["member_email"] = $row["member_email"];
            $arrCol["user_image"] = $row["user_image"];		    
	    array_push($resultArray,$arrCol);
	}
      }
	
echo json_encode($resultArray);

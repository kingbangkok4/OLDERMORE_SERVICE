<?php
date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/member.php";
$obj = new Member();
$dateNow = date("d",strtotime(date("Y-m-d")));

$user_id =  $_REQUEST["user_id"];

$rows = $obj->read(" u.user_id = {$user_id} ");

$resultArray = array();

	if ($rows != false) {
		//foreach ($rows as $row) {
            $row = $rows[0];			
            //echo ($row["user_id"]);			
            $arrCol = array();
            $arrCol["member_id"] = $row["member_id"];
            $arrCol["member_name"] = $row["member_name"];
            $arrCol["member_mobile"] = $row["member_mobile"];
            $arrCol["member_address"] = $row["member_address"];
            $arrCol["member_email"] = $row["member_email"];
            $arrCol["user_image"] = $row["user_image"];
			    
            $arrCol["status"] = "1";
            $arrCol["error"] = "";
		    
	    array_push($resultArray,$arrCol);
		//}
	}else{
            $arrCol = array();
            $arrCol["member_id"] = "";
            $arrCol["member_name"] = "";
            $arrCol["member_mobile"] = "";
            $arrCol["member_address"] = "";
            $arrCol["member_email"] = "";
            $arrCol["user_image"] = "";
			
            $arrCol["status"] = "0";
            $arrCol["error"] = "ไม่พบข้อมูล";

            array_push($resultArray,$arrCol);
	}
	
echo json_encode($resultArray);

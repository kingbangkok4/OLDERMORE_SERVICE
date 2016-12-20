<?php
date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/health.php";
$obj = new Health();
$dateNow = date("d",strtotime(date("Y-m-d")));

$user_id =  $_REQUEST["user_id"];

$rows = $obj->read(" user_id = {$user_id} ");

$resultArray = array();

	if ($rows != false) {
		//foreach ($rows as $row) {
            $row = $rows[0];			
            //echo ($row["user_id"]);			
            $arrCol = array();
            $arrCol["health_id"] = $row["health_id"];
            $arrCol["con_disease"] = $row["con_disease"];
            $arrCol["drug_allergy"] = $row["drug_allergy"];
            $arrCol["doctor"] = $row["doctor"];
            $arrCol["doctor_mobile"] = $row["doctor_mobile"];
            $arrCol["hotel"] = $row["hotel"];
            $arrCol["hotel_mobile"] = $row["hotel_mobile"];
            $arrCol["user_id"] = $row["user_id"];
			    
            $arrCol["status"] = "1";
            $arrCol["error"] = "";
		    
	    array_push($resultArray,$arrCol);
		//}
	}else{
            $arrCol = array();
            $arrCol["health_id"] = "";
            $arrCol["con_disease"] = "";
            $arrCol["drug_allergy"] = "";
            $arrCol["doctor"] = "";
            $arrCol["doctor_mobile"] = "";
            $arrCol["hotel"] = "";
            $arrCol["hotel_mobile"] = "";
            $arrCol["user_id"] = "";
			
            $arrCol["status"] = "0";
            $arrCol["error"] = "ไม่พบข้อมูล";

            array_push($resultArray,$arrCol);
	}
	
echo json_encode($resultArray);

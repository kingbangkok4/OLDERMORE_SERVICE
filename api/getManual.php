<?php
date_default_timezone_set('Asia/Bangkok');
include "../lib/std.php";
include "../lib/helper.php";
include "../lib/dbConnector.php";
include "../model/manual.php";
$obj = new Manual();
$dateNow = date("d",strtotime(date("Y-m-d")));

$rows = $obj->read();
$resultArray = array();

	if ($rows != false) {
		//foreach ($rows as $row) {
            $row = $rows[0];			
            //echo ($row["user_id"]);			
            $arrCol = array();
            $arrCol["manual_id"] = $row["manual_id"];
            $arrCol["manual_video"] = $row["manual_video"];
            $arrCol["manual_word"] = $row["manual_word"];
			    
            $arrCol["status"] = "1";
            $arrCol["error"] = "";
		    
	    array_push($resultArray,$arrCol);
		//}
	}else{
            $arrCol = array();
            $arrCol["manual_id"] = "";
            $arrCol["manual_video"] = "";
            $arrCol["manual_word"] = "";

			
            $arrCol["status"] = "0";
            $arrCol["error"] = "ไม่พบข้อมูล";

            array_push($resultArray,$arrCol);
	}
	
echo json_encode($resultArray);

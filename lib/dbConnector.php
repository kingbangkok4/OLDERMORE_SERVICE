<?php
//$user = "root";
//$pass = "";
//$dbName = "curtain";

//----------------------------
$user = "root";
$pass = "";
$dbName = "oldermore_db";
//----------------------------
$host = "localhost";

$dbLink = mysql_connect($host, $user, $pass) or die("Can not connect to database");
mysql_select_db("$dbName", $dbLink) or die ("Can not select DB");

function closeDB(){
    mysql_close($GLOBALS["dbLink"]);
}
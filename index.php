<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');
include './lib/std.php';
include './lib/helper.php';
include "./lib/dbConnector.php";
requireLogin();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> </title>
		
    </head>
    <body>
        <?php
        include "menu.php";
        if ($_GET["viewName"] != "") {
            include "./views/{$_GET["viewName"]}.php";
        } else {
            redirect("index.php?viewName=");
        }
        ?>
    </body>
</html>

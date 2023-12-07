<?php

$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "OnlineStore";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}

define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/lab2/assets/image/");
define("FETCH_SRC","http://127.0.0.1/lab2/assets/image/");
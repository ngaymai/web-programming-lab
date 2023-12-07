<?php
include "db_conn.php";



if (isset($_GET["remove"])) {

    $id = $_GET['remove'];
    $query = "delete from products where productID = $id";
    $result = $conn->query($query);
    print_r($result);
    header("Location: index.php?page=products");
}

<?php
include "db_conn.php";



if (isset($_GET["edit"])) {    
    $id = $_GET['edit'];

    $query = "select * from products where productID = $id";
    $result = $conn->query($query);

    $row = $result->fetch_assoc();

    echo "<script> 
    $('#editModal').modal({
        keyboard: false
      })
      $('#editModal').modal('show')
    </script>";
}

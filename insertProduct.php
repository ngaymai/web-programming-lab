<?php
session_start();
include "db_conn.php";

function image_upload($img)
{

    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111, 99999) . $img['name'];

    $new_loc = UPLOAD_SRC . $new_name;

    move_uploaded_file($tmp_loc, $new_loc);
    return $new_name;
}



if (isset($_POST['addProduct'])) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($conn, $value);
    }
    $imagePath = "product.png";
    if ($_FILES['image']['name'] != "") {
        $imagePath = image_upload($_FILES['image']);
    }
    $sql = "INSERT INTO products(productionName, prices, picture) VALUES (?, ?, ?)";



    $stmt = $conn->stmt_init();
    $stmt->prepare($sql);


    $stmt->bind_param("sss", $_POST["name"], $_POST["price"], $imagePath);

    if ($stmt->execute()) {
        header("Location: index.php?page=products");
    }
}

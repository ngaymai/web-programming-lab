<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE if not exists OnlineStore";
// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . $conn->error;
// }
$dbname = "OnlineStore";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "CREATE TABLE if not exists products (
    productID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productionName VARCHAR(30) NOT NULL,
    prices DOUBLE NOT NULL,
    picture VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
$sql2 = "CREATE TABLE if not exists users (
        userID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(128) NOT NULL,        
        email VARCHAR(255) NOT NULL UNIQUE KEY,
        username VARCHAR(64) NOT NULL UNIQUE KEY,
        passwd VARCHAR(255) NOT NULL,
        roleId BINARY NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

if ($conn->query($sql1) === TRUE) {
    // echo "Table productions created successfully";
} else {
    // echo "Error creating table: " . $conn->error;
}

if ($conn->query($sql2) === TRUE) {
    // echo "Table users created successfully";
} else {
    // echo "Error creating table: " . $conn->error;
}

<?php
session_start();


include("dbconnection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["roleId"];
} else {
    die("");
}
$checkEmail = "select email from users where email = '$email'";
$checkUsername = "select username from users where username = '$username'";
if ($conn->query($checkEmail)->num_rows > 0) {
    $_SESSION['message'] = "Email already exists";
    header("location: index.php?page=register");
    exit(0);
} elseif ($conn->query($checkUsername)->num_rows > 0) {
    $_SESSION['message'] = "Username already exists";
    header("location: index.php?page=register");
    exit(0);
}

$sql = "INSERT INTO USERS(fullname, email, username, passwd, roleId) VALUES (?, ?, ?, ?, ?)";

$encryptPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->stmt_init();
$stmt->prepare($sql);
$stmt->bind_param("sssss", $fullname, $email, $username, $encryptPassword, $role);
if ($stmt->execute()) {
    $_SESSION['message'] = "Signup success !";
    header("Location: index.php?page=register");
    exit(0);
} else {
    die("sql insert error: " . $conn->error . "error number: " . $stmt->errno . "end error");
}

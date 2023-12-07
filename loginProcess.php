<?php
include "db_conn.php";

echo "<script>console.log('hello login_processing' );</script>";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    $uname = validate($_POST['email']);

    $pass = validate($_POST['password']);



    if (empty($uname)) {

        header("Location: index.php?page=login&error=User Name is required");

        exit();
    } else if (empty($pass)) {

        header("Location: index.php?page=login&error=Password is required");

        exit();
    } else {


        $sql = "SELECT * FROM users WHERE email='$uname'";

        $result = $conn->query($sql);

        $user = $result->fetch_assoc();
        echo "<script>console.log('Debug Objects: " . $user['passwd'] . "' );</script>";
        echo "<script>console.log('Debug Objects: " . $pass . "' );</script>";


        if ($user) {
            if (!password_verify($pass, $user["passwd"])) {
                header("Location: index.php?page=login&error=Incorect password");
                exit();
            } else {
                session_start();
                $_SESSION['user'] = $user;

                header("Location: index.php?page=home");
            }
        } else {
            header("Location: index.php?page=login&error=Email not exit");
            exit();
        }
    }
}

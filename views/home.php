<?php
if (isset($_SESSION['user'])) {

    $user = $_SESSION['user'];
    if ($user['roleId']) {
        include "adminHome.php";
    } else {
        include "userHome.php";
    }
} else {
    include "guestHome.php";
}

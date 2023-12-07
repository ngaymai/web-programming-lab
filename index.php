
<?php
session_start();

include "./views/components/header.php";
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    // Include the content based on the 'page' parameter
    if ($page === 'home') {
        include('./views/home.php');
    } elseif ($page === 'register') {
        include('./views/signup.php');
    } elseif ($page === 'login') {
        include('./views/login.php');
    } elseif ($page === 'products') {
        if (isset($_SESSION['user'])) {
            include('./views/products.php');
        } else {
            include('./views/guestProducts.php');
        }
    }
} else if (isset($_GET['search'])) {
    include('./views/products.php');
} else {
    include('./views/home.php'); // Default page
}
include "./views/components/footer.php";
?>
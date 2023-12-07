<?php

include('db_conn.php');

$initial_page = 0;
$limit = 10;

if (isset($_GET["page"])) {
    $page_number  = $_GET["page"];
    $initial_page = ($page_number - 1) * $limit;
} else {
    $page_number = 1;
    $initial_page = ($page_number - 1) * $limit;
};


$sql = "SELECT * FROM products LIMIT $initial_page, $limit";

$result = mysqli_query($conn, $sql);

?>

<table class="table table-bordered table-striped">

    <thead>

        <tr>

            <th>ID</th>

            <th>Name</th>

            <th>Price</th>

        </tr>

    </thead>

    <tbody>

        <?php

        while ($row = mysqli_fetch_array($result)) {

        ?>

            <tr>

                <td><?php echo $row["productID"]; ?></td>

                <td><?php echo $row["productionName"]; ?></td>

                <td><?php echo $row["prices"]; ?></td>

            </tr>

        <?php

        };

        ?>

    </tbody>

</table>
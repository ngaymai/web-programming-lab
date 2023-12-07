<?php
include("db_conn.php");

// Perform query
$sql = "";
$response = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    // Perform a search query
    $sql = "SELECT * FROM products WHERE productionName LIKE '%$search%'";
    $result = $conn->query($sql);
    // Check for query result
    if ($result->num_rows > 0) {
        // Output data in XML format


        while ($row = $result->fetch_assoc()) {

            echo "      
        <tr>
        <th scope='row'>{$row['productID']}</th>
        <td><img src={$row['picture']} width='150px'></td>
        <td> {$row['productionName']}  </td>
        <td> {$row['prices']} vnd </td>
        
        </tr>        
        ";
        }
    } else {
        $response = "<span> 0 results found </span>";
    }
}

echo $response;

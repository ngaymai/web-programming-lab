<div class="container bg-dark p-3 my-4 rounded text-light">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1>Products Page</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Insert product</button>


    </div>
    <form class="form-inline my-2 my-lg-0 mt-4" method="get">

        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search" name="search" onkeyup="loadData(this.value)">
        <div id="livesearch"></div>
        <button class="btn btn-primary my-2 my-sm-0">Search</button>
    </form>
</div>

<div class="container">

    <!-- <button type="button" class="btn btn-primary" id="list"> list production </button> -->

    <table id="table" class="table table-striped">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody id="productData">
        </tbody>
    </table>
    <script src="guestAjax.js"></script>

</div>

<?php
include("db_conn.php");
$fetch_src = FETCH_SRC;
if (isset($_GET["edit"])) {
    echo "hello";
    $id = $_GET['edit'];

    $query = "select * from products where productID = $id";
    $result = $conn->query($query);

    $row = $result->fetch_assoc();

    echo "<script> 
 $('#editModal').modal({
    keyboard: false
    })
    document.getElementById('editname').value = '$row[productionName]';
    document.querySelector('#editprice').value=`$row[prices]`;
    document.querySelector('#editimage').src=`$row[picture]`;
$('#editModal').modal('show')


</script>";

    $result->close();
}
$conn->close();

?>
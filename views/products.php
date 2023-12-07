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


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="insertProduct.php" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Production name:</label>
                            <input type="text" class="form-control" id="productionName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Price: </label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name='addProduct'>submit</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="editProduct.php" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Production name:</label>
                            <input type="text" class="form-control" name="name" id="editname">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Price: </label>
                            <input type="number" class="form-control" name="price" id="editprice">
                        </div>
                        <img src="" id="editimage" width="100%" class="mb-3"> <br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="editupload" aria-describedby="inputGroupFileAddon01" name="image">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name='editProduct'>Edit</button>

                    </div>
                </div>
            </form>
        </div>
    </div>


    <table id="table" class="table table-striped">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="productData">
        </tbody>
    </table>
    <script src="ajax.js"></script>

    <!-- <script>
        function confirmRemove($id) {
            if (confirm("Are you sure to delete this item ?")) {
                window.location.href = "delProduct.php?remove=" + $id;
            }
        }
    </script> -->
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
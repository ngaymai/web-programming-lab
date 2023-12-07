function loadData(str) {
    // Create a new XMLHttpRequest object
    let xhr = new XMLHttpRequest();

    // Configure it: GET-request to the specified PHP file

    if (!str) {
        xhr.open('GET', 'guest-search-results.php', true);
    } else {
        xhr.open('GET', 'guest-search-results.php?search=' + str, true);
    }




    // Setup a function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Display the content in the 'productData' div
            console.log(xhr.responseText);
            document.getElementById('productData').innerHTML = xhr.responseText;
        }
    };

    // Send the request
    xhr.send();
}

// Call the function when the page is loaded
window.onload = loadData("");


function confirmRemove($id) {
    if (confirm("Are you sure to delete this item ?")) {
        window.location.href = "delProduct.php?remove=" + $id;
    }
}


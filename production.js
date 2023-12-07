const btn = document.getElementById('list');

btn.addEventListener('click', () => {
    const table = document.getElementById('table');

    if (table.style.display === 'none') {
        // 👇️ this SHOWS the table
        table.style.display = 'block';
    } else {
        // 👇️ this HIDES the table
        table.style.display = 'none';
    }
});

function confirmRemove($id) {
    if (confirm("Are you sure to delete this item ?")) {
        window.location.href = "delProduct.php?remove=" + $id;
    }
}
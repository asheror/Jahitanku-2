document.addEventListener('DOMContentLoaded', function() {
    fetch('fetch_products.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('product-list').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
});

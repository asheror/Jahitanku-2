<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2 class="mb-4">Add New Product</h2>
    <form action="insert_product.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_produk">Product Name</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
        </div>
        <div class="form-group">
            <label for="foto">Product Photo</label>
            <input type="file" class="form-control-file" id="foto" name="foto">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="form-group">
            <label for="harga">Price</label>
            <input type="text" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Description</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="diskon">Discount</label>
            <input type="text" class="form-control" id="diskon" name="diskon">
        </div>
        <div class="form-group">
            <label for="kategori">Category</label>
            <input type="text" class="form-control" id="kategori" name="kategori" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>

    <h2 class="mt-5">Product List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Photo</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Description</th>
                <th>Discount</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tb_produk";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["id_produk"]. "</td>
                        <td>" . $row["nama_produk"]. "</td>
                        <td><img src='uploads/" . $row["foto"]. "' alt='" . $row["nama_produk"]. "' width='50'></td>
                        <td>" . $row["stock"]. "</td>
                        <td>" . $row["harga"]. "</td>
                        <td>" . $row["deskripsi"]. "</td>
                        <td>" . $row["diskon"]. "%</td>
                        <td>" . $row["kategori"]. "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No products found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

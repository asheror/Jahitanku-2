<?php
include 'db.php';

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

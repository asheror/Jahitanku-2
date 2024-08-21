<?php
include 'database.php';

$nama_produk = $_POST['nama_produk'];
$stock = $_POST['stock'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$diskon = $_POST['diskon'];
$kategori = $_POST['kategori'];

$foto = $_FILES['foto']['name'];
$target = "uploads/".basename($foto);

$sql = "INSERT INTO tb_produk (nama_produk, foto, stock, harga, deskripsi, diskon, kategori) VALUES ('$nama_produk', '$foto', '$stock', '$harga', '$deskripsi', '$diskon', '$kategori')";

if ($conn->query($sql) === TRUE) {
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) {
        echo "Product added successfully!";
    } else {
        echo "Error uploading image.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
?>

<?php
include '../koneksi.php';

$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$gambar = '';
if ($_FILES['gambar']['name']) {
    $gambar = 'uploads/' . basename($_FILES['gambar']['name']);
    move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
}

$sql = "INSERT INTO products (nama_produk, deskripsi, gambar, kategori, harga, stok) 
        VALUES ('$nama_produk', '$deskripsi', '$gambar', '$kategori', $harga, $stok)";

if ($conn->query($sql)) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $conn->error;
}
?>

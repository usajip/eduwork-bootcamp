<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama_produk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$gambar = '';
if ($_FILES['gambar']['name']) {
    $gambar = 'uploads/' . basename($_FILES['gambar']['name']);
    move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    // Update gambar jika ada
    $sql = "UPDATE products SET 
            nama_produk = '$nama_produk', 
            deskripsi = '$deskripsi', 
            gambar = '$gambar', 
            kategori = '$kategori', 
            harga = $harga, 
            stok = $stok 
            WHERE id = $id";
} else {
    // Update tanpa mengganti gambar
    $sql = "UPDATE products SET 
            nama_produk = '$nama_produk', 
            deskripsi = '$deskripsi', 
            kategori = '$kategori', 
            harga = $harga, 
            stok = $stok 
            WHERE id = $id";
}

if ($conn->query($sql)) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $conn->error;
}
?>

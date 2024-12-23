<?php
include '../koneksi.php';

$id = $_GET['id'];

// Hapus data berdasarkan ID
$sql = "DELETE FROM products WHERE id = $id";

if ($conn->query($sql)) {
    header("Location: dashboard.php");
} else {
    echo "Error: " . $conn->error;
}
?>

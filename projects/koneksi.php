<?php
// Konfigurasi database
$host = 'localhost'; // Host database
$user = 'root'; // Username database
$password = 'passwordKu123!'; // Password database
$dbname = 'toko'; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    // echo "Koneksi berhasil!";
}
?>

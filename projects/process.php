<?php
// Cek apakah data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars(trim($_POST['name']));
    $harga = htmlspecialchars(trim($_POST['harga']));
    $deskripsi = htmlspecialchars(trim($_POST['deskripsi']));

    // Validasi sederhana
    if (empty($name) || empty($harga)) {
        echo "Name and Harga are required fields.";
        exit;
    }

    // Tampilkan data yang diterima
    echo "<h1>Form Data Received</h1>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Harga:</strong> $harga</p>";
    echo "<p><strong>Deskripsi:</strong><br>" . nl2br($deskripsi) . "</p>";
} else {
    echo "No data received.";
}
?>

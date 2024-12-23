<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi sederhana
    if(empty($name) || empty($email) || empty($password)){
        echo "Semua field harus diisi.";
        exit;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email tidak valid.";
        exit;
    }

    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($query)) {
        header("Location: read.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data</h1>
    <form method="POST">
        <label>Nama:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password:</label><br>
        <input type="text" name="password" required><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>

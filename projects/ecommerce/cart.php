<?php
include '../koneksi.php';

session_start();

// Buat session jika belum ada
if (!isset($_SESSION['cart_session'])) {
    $_SESSION['cart_session'] = session_id();
}

// Ambil session ID
$session_id = $_SESSION['cart_session'];

// Ambil data keranjang berdasarkan sesi
$result = $conn->query("SELECT cart.id, products.nama_produk, products.harga, cart.quantity 
                        FROM cart 
                        JOIN products ON cart.product_id = products.id 
                        WHERE cart.session_id = '$session_id'");

// Hapus item dari keranjang
if (isset($_POST['remove'])) {
    $cart_id = $_POST['cart_id'];
    $conn->query("DELETE FROM cart WHERE id = $cart_id AND session_id = '$session_id'");
    header("Location: cart.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar  navbar-expand-lg navbar-light bg-primary">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php">Keranjang</a>
            </li>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h1 class="mb-4">Your Cart</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['nama_produk'] ?></td>
                <td>Rp<?= number_format($row['harga'], 0, ',', '.') ?></td>
                <td><?= $row['quantity'] ?></td>
                <td>Rp<?= number_format($row['harga'] * $row['quantity'], 0, ',', '.') ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="cart_id" value="<?= $row['id'] ?>">
                        <button type="submit" name="remove" class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-primary mt-4">Continue Shopping</a>
</div>
</body>
</html>

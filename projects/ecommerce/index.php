<?php
include '../koneksi.php';

session_start();

// Buat session jika belum ada
if (!isset($_SESSION['cart_session'])) {
    $_SESSION['cart_session'] = session_id();
}

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $session_id = $_SESSION['cart_session'];

    // Cek apakah produk sudah ada di keranjang untuk sesi ini
    $check_cart = $conn->query("SELECT * FROM cart WHERE product_id = $product_id AND session_id = '$session_id'");
    if ($check_cart->num_rows > 0) {
        // Update jumlah produk di keranjang
        $conn->query("UPDATE cart SET quantity = quantity + $quantity WHERE product_id = $product_id AND session_id = '$session_id'");
    } else {
        // Tambahkan produk ke keranjang
        $conn->query("INSERT INTO cart (product_id, quantity, session_id) VALUES ($product_id, $quantity, '$session_id')");
    }
    header("Location: index.php");
}

// Ambil produk berdasarkan kategori (jika ada filter)
$category_filter = isset($_GET['kategori']) ? $conn->real_escape_string($_GET['kategori']) : '';

if (!empty($category_filter)) {
    $sql = "SELECT * FROM products WHERE kategori = '$category_filter'";
    $result = $conn->query($sql);
} else {
    // Query untuk mengambil produk
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
}



// Ambil daftar kategori unik dari tabel produk
$categories_sql = "SELECT DISTINCT kategori FROM products";
$categories_result = $conn->query($categories_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
    <div class="container my-5">
        <!-- Filter Form -->
        <form method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <select name="kategori" class="form-select">
                        <option value="">All Categories</option>
                        <?php if ($categories_result->num_rows > 0): ?>
                            <?php while ($category = $categories_result->fetch_assoc()): ?>
                                <option value="<?= htmlspecialchars($category['kategori']) ?>" 
                                    <?= $category_filter == $category['kategori'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['kategori']) ?>
                                </option>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <h1 class="text-center mb-4">E-commerce Store</h1>
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars($row['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['nama_produk']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['nama_produk']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($row['deskripsi']) ?></p>
                                <p class="card-text"><strong>Price: Rp<?= htmlspecialchars(number_format($row['harga'], 0, ",", ".")) ?></strong></p>
                                <form method="POST">
                                    <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                                    <div class="mb-3">
                                        <input type="number" name="quantity" class="form-control" min="1" max="<?= $row['stok'] ?>" value="1" required>
                                    </div>
                                    <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">No products available.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

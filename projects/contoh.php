<?php
include '../koneksi.php';

// Ambil kategori dari parameter URL
$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
if ($kategori) {
    // Query untuk mendapatkan data
    $query = "SELECT * FROM products WHere id = '$kategori'";
    $result = $conn->query($query);
}else{
    // Query untuk mendapatkan data
    $query = "SELECT * FROM products";
    $result = $conn->query($query);

}


// Query untuk mendapatkan daftar kategori unik
$kategori_query = "SELECT DISTINCT id FROM products";
$kategori_result = $conn->query($kategori_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page E-Commerce</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Welcome to Our E-Commerce Store</h1>
            <p class="lead">Find the best products at unbeatable prices!</p>
            <a href="#products" class="btn btn-light btn-lg">Shop Now</a>
        </div>
    </header>

    <!-- Filter Form -->
    <form method="GET" class="mb-4">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="kategori" class="form-label">Pilih Kategori:</label>
                </div>
                <div class="col-auto">
                    <select name="kategori" id="kategori" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        <?php while ($row = $kategori_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] === $kategori) echo 'selected'; ?>>
                                <?php echo $row['id']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
        </form>
    <!-- Product Section -->
    <section id="products" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Our Products</h2>
            <div class="row">
                <!-- Product 1 -->
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4">
                            <div class="card">
                                <img src="'.$row["gambar"].'" class="card-img-top" alt="Product 1">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row["nama_produk"].'</h5>
                                    <p class="card-text">Rp'.number_format($row["harga"], 0, ",", ".").'</p>
                                    <a href="#" class="btn btn-primary">Buy Now</a>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<div>No products found.</div>';
                }
            ?>
                
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container text-center">
            <h2>About Us</h2>
            <p class="lead">We are a leading e-commerce platform committed to providing the best products and services to our customers.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container text-center">
            <h2>Contact Us</h2>
            <p class="lead">Have questions? Reach out to us!</p>
            <a href="mailto:info@ecommerce.com" class="btn btn-primary">Email Us</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 E-Commerce Store. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

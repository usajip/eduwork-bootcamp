<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori Produk</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Daftar Produk</h1>
            <button class="btn btn-primary" onclick="addCategory()">Tambah Produk</button>
        </div>
        
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh data dummy -->
                <tr>
                    <td>1</td>
                    <td>Produk A</td>
                    <td>Deskripsi Produk A</td>
                    <td>50</td>
                    <td>Rp50.000</td>
                    <td><img src="https://via.placeholder.com/150" alt="Produk A"></td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editCategory(1)">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteCategory(1)">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Script JS -->
    <script>
        function addCategory() {
            alert("Tambah kategori baru!");
        }

        function editCategory(id) {
            alert("Edit kategori dengan ID: " + id);
        }

        function deleteCategory(id) {
            if (confirm("Apakah Anda yakin ingin menghapus kategori dengan ID: " + id + "?")) {
                alert("Kategori dengan ID: " + id + " berhasil dihapus.");
            }
        }
    </script>
    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


RewriteEngine on
RewriteCond %{HTTP_HOST} ^namadomain.com$ [NC,OR]
RewriteCond %{HTTP_HOST} ^www.namadomain.com$
RewriteCond %{REQUEST_URI} !namafolder/
RewriteRule (.*) /namafolder/$1 [L]
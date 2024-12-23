<?php
// Include file koneksi
include 'koneksi.php';

// Query untuk mengambil data
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Cek apakah ada data yang ditemukan
if (mysqli_num_rows($result) > 0) {
    // Menampilkan data dalam bentuk tabel
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data.";
}

// Menutup koneksi
mysqli_close($conn);
?>
<?php
session_start();
include '../backend/db.php';

// Pastikan hanya admin yang bisa mengakses halaman ini
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php"); // Ganti dengan halaman login Anda jika perlu
    exit();
}

$sql = "SELECT * FROM pesanan";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/styleAdmin.css"> <!-- Sesuaikan dengan lokasi CSS Anda -->
</head>

<body>
    <header class="navbar">
        <div class="container">
            <h1 class="logo">Admin Dashboard</h1>
            <nav class="nav-links">
                <a href="../backend/logout.php">Logout</a> <!-- Sesuaikan dengan link logout Anda -->
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="queue">
                <h2>Customer Queue</h2>
                <div class="queue-table">
                <table>
    <thead>
        <tr>
            <th>No.Antrian</th>
            <th>Nama</th>
            <th>Nomor Hp</th>
            <th>Model Potongan</th>
            <th>Harga</th>
            <th>Waktu Pemesanan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nama_pelanggan']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nomor_hp']) . "</td>";
                echo "<td>" . htmlspecialchars($row['model_potongan']) . "</td>";
                echo "<td>Rp. " . number_format($row['harga'], 0, ',', '.') . "</td>";
            
                // Format waktu dalam bahasa Indonesia
                $waktu_pesan_indonesia = date('d F Y H:i', strtotime($row['waktu_pesan']));
                echo "<td>" . htmlspecialchars($waktu_pesan_indonesia) . "</td>";
                
                // Tombol delete dengan form POST
                echo "<td>
                          <form method='POST' action='../backend/delete_pesanan.php'>
                              <input type='hidden' name='pesanan_id' value='" . htmlspecialchars($row['id']) . "'>
                              <button type='submit' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this order?');\">Delete</button>
                          </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </tbody>
</table>


                </div>
            </section>
        </div>
    </main>


    <footer>
        <div class="container">
            <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
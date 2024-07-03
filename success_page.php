<?php
session_start();
include 'backend/db.php';

// Pastikan ID diterima dari parameter URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data pesanan berdasarkan ID
    $sql = "SELECT * FROM pesanan WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Loop through hasil query jika ada data
        while ($row = $result->fetch_assoc()) {
            $nomor_antrian = $row['nomor_antrian'];
            $nama = $row['nama_pelanggan'];
            $nomor_hp = $row['nomor_hp'];
            $model_potongan = $row['model_potongan'];
            $harga = $row['harga'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbershop - Pemesanan Berhasil</title>
    <link rel="stylesheet" href="css/order.css">
</head>

<body>
    <header class="navbar">
        <div class="container">
            <h1 class="logo">Barbershop</h1>
            <nav class="nav-links">
                <a href="index.php">Home</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="booking-form" style="display: flex; flex-direction:column; align-items:center">
                <h1>Pemesanan Berhasil!</h1>
                <p>Terima kasih telah melakukan pemesanan di Barbershop. Detail pesanan Anda:</p>
                <ul>
                    <li style="margin-bottom: 10px;"><strong>Nomor Antrian:</strong> <?php echo $nomor_antrian; ?></li>
                    <li style="margin-bottom: 10px;"><strong>Nama:</strong> <?php echo $nama; ?></li>
                    <li style="margin-bottom: 10px;"><strong>Nomor HP:</strong> <?php echo $nomor_hp; ?></li>
                    <li style="margin-bottom: 10px;"><strong>Model Potongan:</strong> <?php echo $model_potongan; ?></li>
                    <li style="margin-bottom: 10px;"><strong>Harga:</strong> Rp. <?php echo number_format($harga, 0, ',', '.'); ?></li>

                </ul>
                <a href="index.php" class="btn">Kembali ke Beranda</a>
                <br>
                <a href="download.php?id=<?php echo $id; ?>" class="btn">Download Detail Pemesanan (TXT)</a>
            </section>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Barbershop. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>

<?php
        }
    } else {
        echo '<div class="error-message">Data pesanan tidak ditemukan.</div>';
    }

    $conn->close();
} else {
    echo '<div class="error-message">ID pesanan tidak valid.</div>';
}
?>

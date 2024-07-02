<?php
// Variabel untuk menyimpan detail model dan harga default
$model = '';
$harga = 0;

// Periksa apakah parameter 'model' tersedia dan nilainya adalah 'comma'
if (isset($_GET['model']) && $_GET['model'] == 'comma') {
    $model = 'Comma Hair';
    $harga = 70000;
} elseif (isset($_GET['model']) && $_GET['model'] == 'curtain') {
    $model = 'Curtain Haircut';
    $harga = 50000;
} elseif (isset($_GET['model']) && $_GET['model'] == 'fringe') {
    $model = 'Fringe Haircut';
    $harga = 50000;
} elseif (isset($_GET['model']) && $_GET['model'] == 'undercut') {
    $model = 'Undercut';
    $harga = 70000;
} else {
    // Default jika model tidak terdefinisi
    $model = 'Unknown Model';
    $harga = 0; // Harga default bisa disesuaikan
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbershop - Pemesanan</title>
    <link rel="stylesheet" href="css/order.css"> <!-- Sesuaikan dengan lokasi CSS Anda -->
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
            <section class="booking-form">
                <h2>Pemesanan Potongan Rambut</h2>
                <form action="backend/submit_order.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nomor_hp">Nomor HP</label>
                        <input type="text" id="nomor_hp" name="nomor_hp" required>
                    </div>
                    <div class="form-group">
                        <label for="model_potongan">Model Potongan</label>
                        <input type="text" readonly id="model_potongan" name="model_potongan" required value="<?= $model ?>">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" readonly id="harga" name="harga" required value="<?= $harga ?>">
                    </div>
                    <button type="submit">Pesan Sekarang</button>
                </form>
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
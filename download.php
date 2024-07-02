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
        // Ambil data pesanan
        $row = $result->fetch_assoc();
        $nomorAntrian = $row['nomor_antrian'];
        $nama = $row['nama_pelanggan'];
        $nomorHP = $row['nomor_hp'];
        $modelPotongan = $row['model_potongan'];
        $harga = $row['harga'];

        // Buat konten teks untuk detailing pemesanan
        $detailPemesanan = "Detail Pemesanan:\n\n";
        $detailPemesanan .= "Nomor Antrian: $nomorAntrian\n";
        $detailPemesanan .= "Nama: $nama\n";
        $detailPemesanan .= "Nomor HP: $nomorHP\n";
        $detailPemesanan .= "Harga: $harga\n";

        // Header untuk memicu download
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="detail_pemesanan.txt"');

        // Output konten teks
        echo $detailPemesanan;
    } else {
        echo '<div class="error-message">Data pesanan tidak ditemukan.</div>';
    }

    $conn->close();
} else {
    echo '<div class="error-message">ID pesanan tidak valid.</div>';
}
?>

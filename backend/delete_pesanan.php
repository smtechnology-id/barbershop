<?php
session_start();
include '../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pesanan_id'])) {
    // Tangkap id pesanan dari form
    $pesanan_id = $_POST['pesanan_id'];

    // Query untuk menghapus pesanan dari database
    $sql = "DELETE FROM pesanan WHERE id = '$pesanan_id'";

    if ($conn->query($sql) === TRUE) {
        // Menggunakan JavaScript untuk menampilkan pesan sukses
        echo "<script>alert('Pesanan berhasil dihapus');</script>";
        // Redirect kembali ke halaman admin dengan pesan sukses
        echo "<script>window.location.href = '../admin/index.php';</script>";
        exit();
    } else {
        // Menampilkan pesan error jika terjadi masalah dalam penghapusan record
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
        // Redirect kembali ke halaman admin jika terjadi error
        echo "<script>window.location.href = '../admin/index.php';</script>";
        exit();
    }

    $conn->close();
} else {
    // Redirect jika tidak ada POST request atau pesanan_id tidak tersedia
    header("Location: ../admin/index.php");
    exit();
}
?>

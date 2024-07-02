<?php
session_start();
include 'db.php';

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (empty($_POST['nama'])) {
        $errors[] = "Nama harus diisi";
    }
    if (empty($_POST['nomor_hp'])) {
        $errors[] = "Nomor HP harus diisi";
    }
    if (empty($_POST['model_potongan'])) {
        $errors[] = "Model potongan harus dipilih";
    }
    if (empty($_POST['harga'])) {
        $errors[] = "harga Belum Ada";
    }

   
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<div class="error-message">' . $error . '</div>';
        }
    } else {
     
        $nama = $_POST['nama'];
        $nomor_hp = $_POST['nomor_hp'];
        $model_potongan = $_POST['model_potongan'];
        $waktu_pemesanan = date('Y-m-d H:i:s'); 
        $tanggal_sekarang = date('Y-m-d');
        $harga = $_POST['harga'];

        $query_last_queue = "SELECT MAX(nomor_antrian) AS max_queue FROM pesanan WHERE DATE(waktu_pesan) = '$tanggal_sekarang'";
        $result_last_queue = $conn->query($query_last_queue);

        if ($result_last_queue && $result_last_queue->num_rows > 0) {
            $row_last_queue = $result_last_queue->fetch_assoc();
            $nomor_antrian = ($row_last_queue['max_queue'] !== null) ? $row_last_queue['max_queue'] + 1 : 1;
        } else {
            $nomor_antrian = 1; 
        }

        $sql = "INSERT INTO pesanan (nama_pelanggan, nomor_hp, model_potongan, harga, waktu_pesan, status, nomor_antrian) 
                VALUES ('$nama', '$nomor_hp', '$model_potongan',$harga, '$waktu_pemesanan', 'pending', $nomor_antrian)";

        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            header("Location: ../success_page.php?id=" . $last_id);
            exit();
        } else {
            echo '<div class="error-message">Error: ' . $conn->error . '</div>';
        }
        $conn->close();
    }
}

<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "db_rs";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari form input pasien
$nomorRM = $_POST['nomorRM'];
$namaPasien = $_POST['namaPasien'];
$tanggalBerkunjung = $_POST['tanggalBerkunjung'];
$keluhan = $_POST['keluhan'];
$biayaPeriksa = $_POST['biayaPeriksa'];

// Simpan data ke dalam tabel periksa
$sql = "INSERT INTO periksa (nomorRM, namaPasien, tanggalBerkunjung, keluhan, biayaPeriksa) VALUES ('$nomorRM', '$namaPasien', '$tanggalBerkunjung', '$keluhan', '$biayaPeriksa')";

if ($conn->query($sql) === TRUE) {
    echo "Data pasien berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>

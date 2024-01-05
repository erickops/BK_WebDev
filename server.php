<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = ""; // Sesuaikan dengan password MySQL Anda
$database = "riwayatpasien1"; // Sesuaikan dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $database);

$testQuery = "SELECT 1";
$testResult = $conn->query($testQuery);

if (!$testResult) {
    die("Tes koneksi database gagal: " . $conn->error);
}

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomorRM = $_POST["nomorRM"];
    $namaPasien = $_POST["namaPasien"];
    $tanggalBerkunjung = $_POST["tanggalBerkunjung"];
    $keluhan = $_POST["keluhan"];
    $obat = $_POST["obat"];

    $sql = "INSERT INTO pasien (nomorRM, namaPasien, tanggalBerkunjung, keluhan, obat) VALUES ('$nomorRM', '$namaPasien', '$tanggalBerkunjung', '$keluhan', '$obat')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Data pasien berhasil disimpan"]);
    } else {
        echo json_encode(["error" => "Gagal menyimpan data pasien"]);
    }
}

$conn->close();
?>

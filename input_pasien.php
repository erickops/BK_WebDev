<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_rs";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Fungsi untuk menyimpan data ke dalam tabel periksa
function saveDataPeriksa($idDaftarPoli, $tglPeriksa, $catatan, $biayaPeriksa)
{
    global $conn;

    $sql = "INSERT INTO periksa (id_daftar_poli, tgl_periksa, catatan, biaya_periksa) 
            VALUES ('$idDaftarPoli', '$tglPeriksa', '$catatan', '$biayaPeriksa')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan ke dalam tabel periksa.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Proses form jika data disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDaftarPoli = $_POST["id_daftar_poli"];
    $tglPeriksa = $_POST["tgl_periksa"];
    $catatan = $_POST["catatan"];
    $biayaPeriksa = $_POST["biaya_periksa"];

    // Panggil fungsi untuk menyimpan data ke dalam tabel periksa
    saveDataPeriksa($idDaftarPoli, $tglPeriksa, $catatan, $biayaPeriksa);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Periksa Pasien</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form action="#" method="post">
        <label for="id_daftar_poli">ID Daftar Poli:</label>
        <input type="text" id="id_daftar_poli" name="id_daftar_poli" required>

        <label for="tgl_periksa">Tanggal Periksa:</label>
        <input type="date" id="tgl_periksa" name="tgl_periksa" required>

        <label for="catatan">Catatan:</label>
        <textarea id="catatan" name="catatan" rows="4" required></textarea>

        <label for="biaya_periksa">Biaya Periksa:</label>
        <input type="text" id="biaya_periksa" name="biaya_periksa" required>

        <input type="submit" value="Submit">
    </form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
</head>
<body>
    		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="index.html" class="logo">E.</a></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="index.html"><span class="fa fa-home"></span> Dashboard</a>
          </li>
          <li>
              <a href="jadwaldokter.html"><span class="fa fa-user-md"></span> Jadwal Periksa</a>
          </li>
          <li>
            <a href="create.php"><span class="fa fa-stethoscope"></span> Memeriksa Pasien</a>
          </li>
          <li>
            <a href="index.php"><span class="fa fa-heartbeat"></span> Riwayat Pasien</a>
          </li>
          <li>
            <a href="inputdata.html"><span class="fa fa-street-view"></span> Input Data</a>
          </li>
        </ul>

        <div class="footer">
        	<p>
					  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with ❤ - A11.2020.12611<i class="icon-heart" aria-hidden="true"></i>
					</p>
        </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
<div class="container">
    <div class="logo-container">
        <img src="assets/logoudinus.png" alt="Logo" width="75" height="75">
    </div>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = input($_POST["nama"]);
        $sekolah = input($_POST["sekolah"]);
        $jurusan = input($_POST["jurusan"]);
        $no_hp = input($_POST["no_hp"]);
        $alamat = input($_POST["alamat"]);
        $obat = input($_POST["obat"]);

        // Pilihan obat dari form menggunakan array
        $obatArray = isset($_POST["obat"]) ? $_POST["obat"] : array();

        // Mengonversi array obat menjadi string dengan pemisah koma
        $obat = implode(", ", $obatArray);

        // Query input menginput data kedalam tabel anggota
        $sql = "INSERT INTO peserta (nama, sekolah, jurusan, no_hp, alamat, obat) VALUES ('$nama', '$sekolah', '$jurusan', '$no_hp', '$alamat', '$obat')";

        // Mengeksekusi/menjalankan query diatas
        $hasil = mysqli_query($kon, $sql);

        // Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Input Data</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Pasien:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Pasien" required />
        </div>
        <div class="form-group">
            <label>No. RM:</label>
            <input type="text" name="sekolah" class="form-control" placeholder="Masukan No. RM" required/>
        </div>
        <div class="form-group">
            <label>Alamat :</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Alamat" required/>
        </div>
        <div class="form-group">
            <label>No HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required/>
        </div>
        <div class="form-group">
            <label>Keluhan:</label>
            <textarea name="alamat" class="form-control" rows="5" placeholder="Apa keluhan Anda?" required></textarea>
        </div>

        <div class="form-group">
            <label>Pilih Obat (multiple choice):</label>
            <select class="js-example-basic-multiple form-control" multiple="multiple" name="obat">
                <option value="obat1">Paracetamol</option>
                <option value="obat2">Ibuprofen</option>
                <option value="obat3">Antibiotik</option>
            </select>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    // Inisialisasi Select2 pada elemen dengan class js-example-basic-multiple
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    
</script>
<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

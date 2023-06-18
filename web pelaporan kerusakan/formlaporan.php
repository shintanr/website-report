<?php
  include 'fungsi.php';
  if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $tanggal= $_POST['tanggal'];
    $jenis = $_POST['jenis'];
    $fasilitas= $_POST['fasilitas'];
    $deskripsi= $_POST['deskripsi'];
    $masukan= $_POST['masukan'];
    $foto= $_POST['foto'];

    $sql = "insert into `laporan` (nama, tanggal,jenis, fasilitas, deskripsi, masukan, foto) values('$nama','$tanggal', '$jenis', '$fasilitas', '$deskripsi', '$masukan', '$foto')";

    $result=mysqli_query($koneksi, $sql);

    if($result){
      header('location: laporan-user.php');
    } else {
      die(mysqli_error($koneksi));
    }
  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">


    <!-- Data table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="home.php"><b>Terminal Tegal</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="laporan-user.php">Laporan</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="index.html">Logout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- End Navbar -->


    <!-- Container -->
<div class="container">
  <div class="row my-5 ">
    <div class="col-md text-center">
        <h2>
           &nbsp; Buat Laporan
        </h2>
    </div>
    <div class="row justify-content-center my-3">
            <div class="col-md-9">
              <form method="post">
                <div class="row mb-3">
                  <label for="nama" class="col-sm-2 col-form-label fw-bold">Nama Palapor</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" autocomplete="off" required name="nama">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_lapor" class="col-sm-2 col-form-label fw-bold">Tanggal Lapor</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control" id="tgl_lapor" autocomplete="off" required name="tanggal">
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="jeniskerusakan" class="col-sm-2 col-form-label fw-bold">Jenis Kerusakan</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="jenis">
                      <option value="1">Area Tunggu dan Bangku</option>
                      <option value="2">Terminal Pengecekan Tiket</option>
                      <option value="3">Loket dan Pusat Informasi</option>
                      <option value="4">Area Parkir Kendaraan Pribadi</option>
                      <option value="5">Informasi Jadwal dan Pengumuman</option>
                      <option value="6">Wastafel dan Toilet</option>
                      <option value="7">Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="fasilitasrusak" class="col-sm-2 col-form-label fw-bold">Fasilitas yang rusak</label>
                  <div class="col-sm-10 ">
                    <input type="text" class="form-control" id="fasilitasrusak" autocomplete="off" required name="fasilitas">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="deskripsikerusakan" class="col-sm-2 col-form-label fw-bold">Deskripsi Kerusakan</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="deskripsikerusakan"  autocomplete="off" required rows="3" name="deskripsi"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="masukansaran" class="col-sm-2 col-form-label fw-bold">Masukan dan Saran</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="masukansaran" rows="3"  autocomplete="off" required name="masukan"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                  <label for="foto" class="col-sm-2 col-form-label fw-bold">Foto</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="foto" multiple name="foto">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="button" class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <div style="display: flex; justify-content: space-between;">
                      <a href="formlaporan.php" class="btn btn-secondary">Batal</a>
                      <button class="btn btn-warning" type="submit" name="submit">Kirim Laporan</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
  </div>



</div>
    <!-- End Container -->


    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>
</html>
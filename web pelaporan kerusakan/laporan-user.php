<?php
include 'fungsi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Anda</title>
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
            <a class="nav-link" href="home.php">Home</a>
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
    <div class="row my-5 mb-5">
        <div class="col-md">
            <h2 class="text-uppercase text-center fw-bold">DATA LAPORAN</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <a href="formlaporan.php" class="btn btn-warning">Buat Laporan</a>
            <a href="#" class="btn btn-success">Export ke Excel</a>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-md">
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Tanggal Lapor</th>
                <th>Jenis</th>
                <th>Fasilitas</th>
                <th>Deskripsi</th>
                <th>Masukan</th>
                <th>Foto</th>
                <th>Status Laporan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

      <?php
        $sql = "select * from `laporan`";
        $result = mysqli_query($koneksi, $sql);
        if($result){
          while($row=mysqli_fetch_assoc($result)){
            $tanggal = $row['tanggal'];
            $jenis = $row['jenis'];
            $fasilitas = $row['fasilitas'];
            $deskripsi = $row['deskripsi'];
            $masukan = $row['masukan'];
            $foto = $row['foto'];

            echo '
            <tr>
                <td>'.$tanggal.'</td>
                <td>'.$jenis.'</td>
                <td>'.$fasilitas.'</td>
                <td>'.$deskripsi.'</td>
                <td>'.$masukan.'</td>
                <td><img src="$foto" alt="Foto" width="50" height="50"></td>
                <td>Terkirim</td>
                <td>
                <button class="btn btn-primary"><a href="" class="text-light">Pengingat</a></button>
                <button class="btn btn-danger"><a href="" class="text-light">Urungkan</a></button>
                </td>
                
            </tr>
            ';
          }
        }
      ?>


        </tbody>   
        </table>
        </div>
    </div>
</div>
    <!-- End Container -->


    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

<!-- Data Tabel -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js
"></script>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
    });
</script>

</body>
</html>
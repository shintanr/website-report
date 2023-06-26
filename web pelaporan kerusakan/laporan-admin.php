<?php
include 'fungsi.php';

if(isset($_POST['aksi'])) {
    $tgl_selesai = $_GET['tgl_selesai'];

    $sql = "UPDATE `admin_laporan` SET `tgl_selesai` = NOW() WHERE `tanggal` = '$tanggal'";
    mysqli_query($koneksi, $sql);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Rekap Laporan</title>
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
            <a class="nav-link" href="home-admin.php">Home</a>
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
            <h2 class="text-uppercase text-center fw-bold">REKAP LAPORAN</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <a href="#" class="btn btn-success">Export ke Excel</a>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-md">
        <table id="example" class="table table-bordered border-dark table-hover" style="width:100%">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Tanggal Lporan</th>
                <th class="text-center">Nama Pelapor</th>
                <th class="text-center">Kerusakan</th>
                <th class="text-center">Deskripsi</th>
                <th class="text-center">Masukan dan Saran</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Status Laporan</th>
                <th class="text-center">Aksi</th>
                <th class="text-center">Tgl Selesai</th>
            </tr>
        </thead>
        <tbody>

      <?php
        $sql = "select * from `admin_laporan`";
        $result = mysqli_query($koneksi, $sql);
        if($result){
          while($row=mysqli_fetch_assoc($result)){
            $tanggal = $row['tanggal'];
            $nama = $row['nama'];
            $fasilitas = $row['fasilitas'];
            $deskripsi = $row['deskripsi'];
            $masukan = $row['masukan'];
            $foto = $row['foto'];
            $tgl_selesai = $row['tgl_selesai'];

            echo '
    <tr>
        <td class="text-center">'.$tanggal.'</td>
        <td>'.$nama.'</td>
        <td>'.$fasilitas.'</td>
        <td>'.$deskripsi.'</td>
        <td>'.$masukan.'</td>
        <td><img src="'.$foto.'" alt="" width="50" height="50"></td>
        

        <td class="text-center">Verified</td>
        <td>
         <button type="button" class="btn btn-primary" id="selesaiButton" data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="aksi">
         Aksi
         </button>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Laporan sudah ditindaklanjuti? Klik Selesai
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="button" class="btn btn-primary" id="understoodButton">Selesai</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td>'.$tgl_selesai.'</td>
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

    document.addEventListener("DOMContentLoaded", function() {
        var selesaiButtons = document.querySelectorAll(".selesaiButton");

        selesaiButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var tanggal = this.getAttribute("data-tanggal");
                var tglSelesaiCell = document.querySelector("button[data-tanggal='" + tanggal + "']").parentNode.nextElementSibling;

                // Kirim permintaan AJAX ke server untuk memperbarui tanggal selesai
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "update_tgl_selesai.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Tanggapan sukses dari server, perbarui tampilan
                        tglSelesaiCell.textContent = xhr.responseText;
                    }
                };
                xhr.send("tanggal=" + encodeURIComponent(tanggal));
            });
        });
    });

</script>

</body>
</html>


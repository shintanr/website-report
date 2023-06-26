<?php
include 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Periksa apakah ada data POST yang diterima
    if (isset($_POST['tanggal'])) {
        $tanggal = $_POST['tanggal'];

        $sql = "UPDATE `admin_laporan` SET `tgl_selesai` = NOW() WHERE `tanggal` = '$tanggal'";
        mysqli_query($koneksi, $sql);

        // Kirim tanggapan berisi tanggal selesai yang baru ke JavaScript
        echo date("Y-m-d"); // Contoh tanggapan dengan tanggal selesai saat ini
    }
}
?>

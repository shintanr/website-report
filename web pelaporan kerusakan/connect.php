<?php
$koneksi = mysqli_connect("localhost", "root", "", "data_pelapor");


if($koneksi){
    echo "koneksi berhasil";
}
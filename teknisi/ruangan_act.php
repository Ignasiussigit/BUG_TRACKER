<?php
include '../koneksi.php';

$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$ket  = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

mysqli_query($koneksi,"
INSERT INTO ruangan (ruangan_nama, ruangan_keterangan)
VALUES ('$nama','$ket')
");

header("location:ruangan.php");

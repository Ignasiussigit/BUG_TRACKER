<?php
include '../koneksi.php';

$id   = $_POST['id'];
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$ket  = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
$status = $_POST['status'];

mysqli_query($koneksi,"
UPDATE ruangan SET
 ruangan_nama='$nama',
 ruangan_keterangan='$ket',
 ruangan_status='$status'
WHERE ruangan_id='$id'
");

header("location:ruangan.php");

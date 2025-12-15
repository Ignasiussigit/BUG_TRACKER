<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../koneksi.php';

$id     = mysqli_real_escape_string($koneksi, $_POST['id']);
$status = mysqli_real_escape_string($koneksi, $_POST['status']);
$ket    = mysqli_real_escape_string($koneksi, $_POST['keterangan_status']);
$saya   = $_SESSION['id'];

if ($status == "Close") {

    $tanggal_selesai = date('Y-m-d H:i:s');

    mysqli_query($koneksi,"
        UPDATE pengaduan SET
            pengaduan_status = '$status',
            pengaduan_teknisi = '$saya',
            pengaduan_tanggal_penyelesaian = '$tanggal_selesai',
            pengaduan_keterangan_selesai = '$ket'
        WHERE pengaduan_id = '$id'
    ");

} else {

    mysqli_query($koneksi,"
        UPDATE pengaduan SET
            pengaduan_status = '$status',
            pengaduan_teknisi = '$saya',
            pengaduan_tanggal_penyelesaian = NULL,
            pengaduan_keterangan_selesai = '$ket'
        WHERE pengaduan_id = '$id'
    ");
}

header("location:tiket.php?alert=status");
exit;

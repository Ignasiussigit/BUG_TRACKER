<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../koneksi.php';
$id = $_SESSION['id'];
$tanggal = date('Y-m-d');

$id  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
$judul  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['judul']));
$keterangan  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['keterangan']));

mysqli_query($koneksi,"update pengaduan set pengaduan_judul='$judul', pengaduan_keterangan='$keterangan' where pengaduan_id='$id'");
header("location:tiket.php?alert=edit");
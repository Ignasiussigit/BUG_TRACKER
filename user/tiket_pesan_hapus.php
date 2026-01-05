<?php
session_start();
include '../koneksi.php';

$id = $_GET['id'];
$saya = $_SESSION['id'];

$cek = mysqli_query($koneksi,"
  SELECT * FROM pengaduan_chat 
  WHERE pc_id='$id' AND pc_user='$saya'
");

if(mysqli_num_rows($cek) == 0){
  die('Akses ditolak');
}

$c = mysqli_fetch_assoc($cek);
$id_pengaduan = $c['pc_pengaduan'];

mysqli_query($koneksi,"DELETE FROM pengaduan_chat WHERE pc_id='$id'");
header("location:tiket_detail.php?id=$id_pengaduan");

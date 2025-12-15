<?php 
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');
session_start();
$saya = $_SESSION['id'];
$level = "User";
$tiket = $_POST['tiket'];
$pesan = $_POST['pesan'];
$waktu = date('Y-m-d H:i:s');


mysqli_query($koneksi,"insert into pengaduan_chat values(NULL,'$tiket','$saya','$waktu','$pesan','$level')");
header("location:tiket_detail.php?id=$tiket");

 ?>
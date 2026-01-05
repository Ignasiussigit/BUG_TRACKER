<?php
include '../koneksi.php';
session_start();

date_default_timezone_set('Asia/Jakarta');

$saya  = $_SESSION['id'];
$tiket = $_POST['tiket'];
$pesan = trim($_POST['pesan']);

if($pesan != ""){
  mysqli_query($koneksi,"
    INSERT INTO pengaduan_chat 
    VALUES (NULL,'$tiket','$saya',NOW(),'$pesan','Teknisi')
  ");
}

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
  header("location:tiket_detail.php?id=$tiket");
}

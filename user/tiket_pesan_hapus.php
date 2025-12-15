<?php 
include '../koneksi.php';
$id = $_GET['id'];
$cek = mysqli_query($koneksi,"select * from pengaduan_chat where pc_id='$id'");
$c = mysqli_fetch_assoc($cek);
$id_pengaduan = $c['pc_pengaduan'];
mysqli_query($koneksi,"delete from pengaduan_chat where pc_id='$id'");
header("location:tiket_detail.php?id=$id_pengaduan");

 ?>
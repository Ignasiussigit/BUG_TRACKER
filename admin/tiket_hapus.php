<?php 
include '../koneksi.php';
$id = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['id']));

mysqli_query($koneksi, "delete from pengaduan where pengaduan_id='$id'");	
mysqli_query($koneksi, "delete from pengaduan_chat where pc_pengaduan='$id'");	
header("location:tiket.php?alert=hapus");

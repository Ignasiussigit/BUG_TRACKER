<?php 
include '../koneksi.php';
$id = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['id']));

mysqli_query($koneksi, "delete from admin where admin_id='$id'");	
header("location:admin.php?alert=hapus");

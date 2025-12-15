<?php 
include '../koneksi.php';
$id = mysqli_real_escape_string($koneksi, htmlspecialchars($_GET['id']));

mysqli_query($koneksi, "delete from user where user_id='$id'");	
header("location:user.php?alert=hapus");

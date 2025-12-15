<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menangkap data yang dikirim dari form
$nama= mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
$departemen= mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['departemen']));
$username= mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
$password = mysqli_real_escape_string($koneksi, htmlspecialchars(md5($_POST['password'])));

$cek = mysqli_query($koneksi,"select * from user where user_username='$username'");
if(mysqli_num_rows($cek)>0){
	header("location:daftar_user.php?alert=gagal");
}else{
	mysqli_query($koneksi,"insert into user values(NULL,'$nama','','$departemen','$kontak','$username','$password','')");
	header("location:login_user.php?alert=daftar");
}


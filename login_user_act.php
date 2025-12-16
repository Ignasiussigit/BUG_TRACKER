<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menangkap data yang dikirim dari form
$u = mysqli_real_escape_string($koneksi, $_POST['username']);
$p = mysqli_real_escape_string($koneksi, md5($_POST['password']));

$username = htmlspecialchars($u);
$password = htmlspecialchars($p);

$login = mysqli_query($koneksi, "SELECT * FROM user WHERE user_username='$username' AND user_password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['user_id'];
	$_SESSION['nama'] = $data['user_nama'];
	$_SESSION['username'] = $data['user_username'];
	$_SESSION['status'] = "user_logedin";
	header("location:user/");
	
}else{
	header("location:login_user.php?alert=gagal");
}


<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menangkap data yang dikirim dari form
$u = mysqli_real_escape_string($koneksi, $_POST['username']);
$p = mysqli_real_escape_string($koneksi, md5($_POST['password']));

$username = htmlspecialchars($u);
$password = htmlspecialchars($p);

$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	if($data['admin_level']=="Admin"){
		$_SESSION['id'] = $data['admin_id'];
		$_SESSION['nama'] = $data['admin_nama'];
		$_SESSION['username'] = $data['admin_username'];
		$_SESSION['status'] = "admin_logedin";
		header("location:admin/");
	}elseif($data['admin_level']=="Teknisi"){
		$_SESSION['id'] = $data['admin_id'];
		$_SESSION['nama'] = $data['admin_nama'];
		$_SESSION['username'] = $data['admin_username'];
		$_SESSION['status'] = "teknisi_logedin";
		header("location:teknisi/");
	}
	
}else{
	header("location:login.php?alert=gagal");
}


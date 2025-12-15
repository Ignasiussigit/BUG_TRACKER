<?php 
include '../koneksi.php';
session_start();
$id = $_SESSION['id'];
$password_lama = md5($_POST['password_lama']);
$password_baru = md5($_POST['password_baru']);
$konfirmasi_baru = md5($_POST['konfirmasi_baru']);

$cek = mysqli_query($koneksi,"select * from admin where admin_id='$id' and admin_password='$password_lama'");
if(mysqli_num_rows($cek)>0){
	if($password_baru==$konfirmasi_baru){
		mysqli_query($koneksi, "UPDATE admin SET admin_password='$password_baru' WHERE admin_id='$id'")or die(mysqli_errno());
		header("location:gantipassword.php?alert=sukses");
	}else{
		header("location:gantipassword.php?alert=gagal_konfirmasi");
	}
	
}else{
	header("location:gantipassword.php?alert=gagal");
}



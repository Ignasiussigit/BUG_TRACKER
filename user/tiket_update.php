<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../koneksi.php';
$tanggal = date('Y-m-d');

$id  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
$urgency  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['urgency']));
$email  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['email']));
$departemen  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['departemen']));
$judul  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['judul']));
$keterangan  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['keterangan']));


// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg','PNG','JPG','JPEG');
$filename = $_FILES['gambar']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename==""){	
	mysqli_query($koneksi,"update pengaduan set pengaduan_judul='$judul', pengaduan_keterangan='$keterangan', pengaduan_urgency='$urgency', pengaduan_email='$email', pengaduan_departemen='$departemen' where pengaduan_id='$id'");
	header("location:tiket.php?alert=edit");
}else{
	if(!in_array($ext,$allowed) ) {
		header("location:pengaduan.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['gambar']['tmp_name'], '../gambar/tiket/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi,"update pengaduan set pengaduan_judul='$judul', pengaduan_keterangan='$keterangan', pengaduan_urgency='$urgency', pengaduan_email='$email', pengaduan_departemen='$departemen', pengaduan_gambar='$x' where pengaduan_id='$id'");
	header("location:tiket.php?alert=edit");
	}
}




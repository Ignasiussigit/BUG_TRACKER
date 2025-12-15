<?php 
include '../koneksi.php';
$id  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
$nama  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
$email  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['email']));
$departemen  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['departemen']));
$kontak  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kontak']));
$username  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));

$pwd = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));
$password = mysqli_real_escape_string($koneksi, htmlspecialchars(md5($_POST['password'])));

// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg','PNG','JPEG','JPG');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
   mysqli_query($koneksi, "update user set user_nama='$nama', user_email='$email', user_departemen='$departemen', user_kontak='$kontak', user_username='$username' where user_id='$id'");
   header("location:user.php");
}elseif($pwd==""){
   if(!in_array($ext,$allowed) ) {
      header("location:user.php?alert=gagal");
   }else{
      move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
      $x = $rand.'_'.$filename;
      mysqli_query($koneksi, "update user set user_nama='$nama', user_email='$email', user_departemen='$departemen', user_kontak='$kontak', user_username='$username', user_foto='$x' where user_id='$id'");
      header("location:user.php");
   }
}elseif($filename==""){
  mysqli_query($koneksi, "update user set user_nama='$nama', user_email='$email', user_departemen='$departemen', user_kontak='$kontak', user_username='$username', user_password='$password' where user_id='$id'");
  header("location:user.php");
}


<?php 
include '../koneksi.php';
$id  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
$nama  = mysqli_real_escape_string($koneksi, htmlspecialchars( $_POST['nama']));
$username  = mysqli_real_escape_string($koneksi, htmlspecialchars( $_POST['username']));

$pwd = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));
$password = mysqli_real_escape_string($koneksi, htmlspecialchars(md5($_POST['password'])));


// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg','PNG','JPEG','JPG');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
   mysqli_query($koneksi, "update admin set admin_nama='$nama', admin_username='$username' where admin_id='$id'");
   header("location:admin.php");
}elseif($pwd==""){
   if(!in_array($ext,$allowed) ) {
      header("location:admin.php?alert=gagal");
   }else{
      move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
      $x = $rand.'_'.$filename;
      mysqli_query($koneksi, "update admin set admin_nama='$nama', admin_username='$username', admin_foto='$x' where admin_id='$id'");
      header("location:admin.php");
   }
}elseif($filename==""){
 mysqli_query($koneksi, "update admin set admin_nama='$nama', admin_username='$username', admin_password='$password' where admin_id='$id'");
 header("location:admin.php");
}


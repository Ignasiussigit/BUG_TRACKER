<?php 
include '../koneksi.php';
$nama  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
$email  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['email']));
$departemen  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['departemen']));
$kontak  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kontak']));
$username  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
$password = mysqli_real_escape_string($koneksi, htmlspecialchars(md5($_POST['password'])));


$cek = mysqli_query($koneksi,"select * from user where user_username='$username'");
if(mysqli_num_rows($cek)>0){
   header("location:user.php?alert=gagal");
}else{

   $rand = rand();
   $allowed =  array('gif','png','jpg','jpeg','PNG','JPEG','JPG');
   $filename = $_FILES['foto']['name'];

   if($filename == ""){
     mysqli_query($koneksi, "insert into user values (NULL,'$nama','$email','$departemen','$kontak','$username','$password','')");
     header("location:user.php");
   }else{
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(!in_array($ext,$allowed)){
         header("location:user.php?alert=gagal");
      }else{
         move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
         $file_gambar = $rand.'_'.$filename;
         mysqli_query($koneksi, "insert into user values (NULL,'$nama','$email','$departemen','$kontak','$username','$password','$file_gambar')");
         header("location:user.php");
      }
   }
}



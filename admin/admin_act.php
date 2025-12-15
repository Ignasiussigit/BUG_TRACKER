<?php 
include '../koneksi.php';
$nama  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
$username  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
$password = mysqli_real_escape_string($koneksi, htmlspecialchars(md5($_POST['password'])));
$level  = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['level']));

$cek = mysqli_query($koneksi,"select * from admin where admin_username='$username'");
if(mysqli_num_rows($cek)>0){
   header("location:admin.php?alert=gagal");
}else{

   $rand = rand();
   $allowed =  array('gif','png','jpg','jpeg','JPG','PNG','JPEG');
   $filename = $_FILES['foto']['name'];

   if($filename == ""){
     mysqli_query($koneksi, "insert into admin values (NULL,'$nama','$username','$password','Admin','')");
     header("location:admin.php");
   }else{
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(!in_array($ext,$allowed)){
         header("location:admin.php?alert=gagal");
      }else{
         move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
         $file_gambar = $rand.'_'.$filename;
         mysqli_query($koneksi, "insert into admin values (NULL,'$nama','$username','$password','Admin','$file_gambar')");
         header("location:admin.php");
      }
   }
}



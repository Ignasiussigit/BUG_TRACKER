<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../koneksi.php';

$id = mysqli_real_escape_string($koneksi, $_POST['id']);

$urgency    = mysqli_real_escape_string($koneksi, $_POST['urgency']);
$email      = mysqli_real_escape_string($koneksi, $_POST['email']);
$departemen = mysqli_real_escape_string($koneksi, $_POST['departemen']);
$judul      = mysqli_real_escape_string($koneksi, $_POST['judul']);
$keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

// cek gambar
$rand     = rand();
$allowed  = ['gif','png','jpg','jpeg','PNG','JPG','JPEG'];
$filename = $_FILES['gambar']['name'];

if ($filename == "") {

    mysqli_query($koneksi,"
        UPDATE pengaduan SET
            pengaduan_judul = '$judul',
            pengaduan_keterangan = '$keterangan',
            pengaduan_urgency = '$urgency',
            pengaduan_email = '$email',
            pengaduan_departemen = '$departemen'
        WHERE pengaduan_id = '$id'
    ");

} else {

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        header("location:tiket.php?alert=gagal");
        exit;
    }

    $file = $rand . '_' . $filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'], '../gambar/tiket/' . $file);

    mysqli_query($koneksi,"
        UPDATE pengaduan SET
            pengaduan_judul = '$judul',
            pengaduan_keterangan = '$keterangan',
            pengaduan_urgency = '$urgency',
            pengaduan_email = '$email',
            pengaduan_departemen = '$departemen',
            pengaduan_gambar = '$file'
        WHERE pengaduan_id = '$id'
    ");
}

header("location:tiket.php?alert=edit");
exit;

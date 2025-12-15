<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../koneksi.php';

$id_user = $_SESSION['id'];
$waktu   = date('Ymd');
$tanggal = date('Y-m-d H:i:s');

// keamanan dasar
$urgency    = mysqli_real_escape_string($koneksi, $_POST['urgency']);
$email      = mysqli_real_escape_string($koneksi, $_POST['email']);
$departemen = mysqli_real_escape_string($koneksi, $_POST['departemen']);
$judul      = mysqli_real_escape_string($koneksi, $_POST['judul']);
$keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

// upload file
$rand     = rand();
$allowed  = ['gif','png','jpg','jpeg','PNG','JPG','JPEG'];
$filename = $_FILES['gambar']['name'];

// default gambar NULL
$file_gambar = NULL;

// jika ada upload gambar
if (!empty($filename)) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $allowed)) {
        header("location:tiket.php?alert=gagal");
        exit;
    }

    $file_gambar = $rand . '_' . $filename;
    move_uploaded_file(
        $_FILES['gambar']['tmp_name'],
        '../gambar/tiket/' . $file_gambar
    );
}

// INSERT DATA PENGADUAN (AMAN & JELAS)
$sql = "
INSERT INTO pengaduan (
    pengaduan_user,
    pengaduan_nomor,
    pengaduan_tanggal,
    pengaduan_judul,
    pengaduan_keterangan,
    pengaduan_urgency,
    pengaduan_email,
    pengaduan_departemen,
    pengaduan_gambar,
    pengaduan_status,
    pengaduan_keterangan_selesai,
    pengaduan_tanggal_penyelesaian,
    pengaduan_teknisi
) VALUES (
    '$id_user',
    '',
    '$tanggal',
    '$judul',
    '$keterangan',
    '$urgency',
    '$email',
    '$departemen',
    " . ($file_gambar === NULL ? "NULL" : "'$file_gambar'") . ",
    'Open',
    NULL,
    NULL,
    NULL
)";

mysqli_query($koneksi, $sql);

// ambil ID tiket
$id_pengaduan = mysqli_insert_id($koneksi);

// generate nomor tiket
$nomor = $waktu . $id_pengaduan;
mysqli_query(
    $koneksi,
    "UPDATE pengaduan 
     SET pengaduan_nomor = '$nomor' 
     WHERE pengaduan_id = '$id_pengaduan'"
);

header("location:tiket.php?alert=tiket");
exit;

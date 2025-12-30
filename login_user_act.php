<?php
// Menghubungkan dengan koneksi database
include 'koneksi.php';

// Ambil input dari form
$input = trim($_POST['username']);
$pass = $_POST['password'];

// Hash password seperti sebelumnya
$pass_hash = md5($pass);

// Escape input untuk mencegah SQL injection (dasar)
$input_escaped = mysqli_real_escape_string($koneksi, $input);
$pass_escaped = mysqli_real_escape_string($koneksi, $pass_hash);

// Query: cocokkan input dengan user_username ATAU user_id, dan cocokkan password
$login = mysqli_query($koneksi, "
    SELECT * FROM user 
    WHERE (user_username = '$input_escaped' OR user_id = '$input_escaped') 
      AND user_password = '$pass_escaped'
");

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    session_start();
    $data = mysqli_fetch_assoc($login);
    $_SESSION['id'] = $data['user_id'];
    $_SESSION['nama'] = $data['user_nama'];
    $_SESSION['username'] = $data['user_username'];
    $_SESSION['status'] = "user_logedin";
    header("location:user/");
    exit;
} else {
    header("location:login_user.php?alert=gagal");
    exit;
}
?>
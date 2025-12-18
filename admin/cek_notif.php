<?php
include '../koneksi.php';

$q = mysqli_query($koneksi,"
  SELECT COUNT(*) AS total 
  FROM pengaduan 
  WHERE pengaduan_status IN ('Open','Pending')
");

$data = mysqli_fetch_assoc($q);

echo $data['total'];

echo json_encode([
    'total' => (int)$data['total']
]);
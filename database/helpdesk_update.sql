-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2025 pada 14.08
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk_update`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_level` enum('Admin','Teknisi','','') NOT NULL,
  `admin_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_level`, `admin_foto`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', NULL),
(3, 'haji', 'haji', '86318e52f5ed4801abe1d13d509443de', 'Admin', ''),
(4, 'Teknisi', 'teknisi', 'e21394aaeee10f917f581054d24b031f', 'Teknisi', ''),
(5, 'teknisi_eng', 'teknisi.eng', 'c88784d0457304e22a30ac8917faa026', 'Teknisi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `pengaduan_id` int(11) NOT NULL,
  `pengaduan_user` int(11) NOT NULL,
  `pengaduan_nomor` varchar(100) NOT NULL,
  `pengaduan_tanggal` datetime NOT NULL,
  `pengaduan_judul` varchar(100) NOT NULL,
  `pengaduan_keterangan` text NOT NULL,
  `pengaduan_urgency` enum('High','Medium','Low','') DEFAULT NULL,
  `pengaduan_email` varchar(50) DEFAULT NULL,
  `pengaduan_departemen` varchar(100) DEFAULT NULL,
  `pengaduan_gambar` varchar(100) DEFAULT NULL,
  `pengaduan_status` enum('Open','Pending','Progress','Close') NOT NULL,
  `pengaduan_keterangan_selesai` varchar(255) DEFAULT NULL,
  `pengaduan_tanggal_penyelesaian` datetime DEFAULT NULL,
  `pengaduan_teknisi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`pengaduan_id`, `pengaduan_user`, `pengaduan_nomor`, `pengaduan_tanggal`, `pengaduan_judul`, `pengaduan_keterangan`, `pengaduan_urgency`, `pengaduan_email`, `pengaduan_departemen`, `pengaduan_gambar`, `pengaduan_status`, `pengaduan_keterangan_selesai`, `pengaduan_tanggal_penyelesaian`, `pengaduan_teknisi`) VALUES
(5, 3, '202401105', '2024-01-10 00:00:00', 'eror sistem', 'error sistem', 'High', 'halo@mailinator.com', 'IT', '1193033338_1.png', 'Close', NULL, '2024-01-10 00:00:00', 4),
(6, 3, '202401106', '2024-01-10 00:00:00', 'Sed ut animi quis l', 'Impedit enim dolori', 'Medium', 'majigemyso@mailinator.com', 'Ipsa dolore iste se', '', 'Close', NULL, '2024-01-10 00:00:00', 4),
(8, 7, '202401108', '2024-01-10 00:00:00', 'Terjadi Kerusakan Listirk Di Office', 'listik mengelupas', 'Medium', 'eko.budipurwanto02@gmail.com', 'ENG', '170447650_Capture.PNG', 'Close', NULL, '2024-01-10 00:00:00', 4),
(9, 7, '202401119', '2024-01-11 00:00:00', 'Komputer error', 'Komputer error dan tidak bisa digunakan', 'Medium', 'eko.budipurwanto02@gmail.com', 'IT', '1761780442_image.png', 'Progress', NULL, '2024-01-11 00:00:00', 4),
(12, 1, '2025091012', '2025-09-10 07:17:07', 'Architecto animi et', 'Ea illo magna volupt', 'Medium', 'fyjohyreqa@mailinator.com', 'TI', '', 'Progress', 'on porgress', '2025-09-10 02:36:57', 4),
(13, 1, '2025091013', '2025-09-10 07:40:01', 'Dolores id Nam velit', 'Culpa deserunt et ne', 'Low', 'guvudywi@mailinator.com', 'Aut ea dolore aut qu', '', 'Open', '', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_chat`
--

CREATE TABLE `pengaduan_chat` (
  `pc_id` int(11) NOT NULL,
  `pc_pengaduan` int(11) NOT NULL,
  `pc_user` int(11) NOT NULL,
  `pc_waktu` datetime DEFAULT NULL,
  `pc_isi` varchar(100) DEFAULT NULL,
  `pc_level` enum('User','Teknisi','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan_chat`
--

INSERT INTO `pengaduan_chat` (`pc_id`, `pc_pengaduan`, `pc_user`, `pc_waktu`, `pc_isi`, `pc_level`) VALUES
(2, 3, 4, '2024-01-09 18:26:48', 'sdasdas', 'Teknisi'),
(4, 3, 3, '2024-01-09 18:32:35', 'sdsa', 'User'),
(6, 4, 4, '2024-01-10 10:43:34', 'butuh waktu berapa lama', 'User'),
(7, 5, 5, '2024-01-10 12:22:03', 'terima kasih', 'User'),
(8, 5, 4, '2024-01-10 12:22:54', 'halo ', 'Teknisi'),
(9, 4, 4, '2024-01-10 14:16:49', 'Sudah close', 'User'),
(10, 8, 4, '2024-01-10 21:29:57', 'hay eko apakah ada yang bisa saya bantu untuk listik', 'Teknisi'),
(11, 8, 4, '2024-01-10 21:40:58', 'saya membutuhkan jawaban anda', 'Teknisi'),
(12, 8, 4, '2024-01-10 21:41:29', 'jika tidak ada jawaban akan saya tutup tiketnya', 'Teknisi'),
(13, 9, 4, '2024-01-11 10:56:29', 'bisa kah anda informasikan kepada saya untuk error komputer seperti apa', 'Teknisi'),
(14, 9, 7, '2024-01-11 10:57:48', 'semua fungsi tidak bisa aktif dan tiba-tiba muncul layar hitam', 'User'),
(15, 9, 4, '2024-01-11 10:58:58', 'ok team kami akan mempersiapkan terlebih dahulu', 'Teknisi'),
(16, 9, 7, '2024-01-11 11:02:10', 'sampai jam berapa untuk penyelesaianya', 'User'),
(17, 12, 4, '2025-09-10 19:24:10', 'afaf', 'Teknisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_departemen` varchar(100) NOT NULL,
  `user_kontak` varchar(15) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_email`, `user_departemen`, `user_kontak`, `user_username`, `user_password`, `user_foto`) VALUES
(1, 'wali arjuna', 'cunda', '', '02989839238', 'wali', 'bf8cd26e6c6732b8df17a31b54800ed8', ''),
(3, 'ali', '', 'IT', '', 'ali', '86318e52f5ed4801abe1d13d509443de', NULL),
(5, 'Quis excepteur volup', 'totiv@mailinator.com', 'ENG', '80', 'mizegebe', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '18792868_2.jpg'),
(7, 'Eko Budi Purwanto', 'eko.budipurwanto02@gmail.com', 'IT', '081380871606', 'eko.budi', '5f4dcc3b5aa765d61d8327deb882cf99', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`pengaduan_id`);

--
-- Indeks untuk tabel `pengaduan_chat`
--
ALTER TABLE `pengaduan_chat`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `pengaduan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_chat`
--
ALTER TABLE `pengaduan_chat`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

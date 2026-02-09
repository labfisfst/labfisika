-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2026 at 05:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_labfisika`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_lab` int(11) DEFAULT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `tahun_pengadaan` varchar(50) DEFAULT NULL,
  `fungsi` text DEFAULT NULL,
  `kondisi` enum('Baik','Rusak') DEFAULT 'Baik',
  `status` enum('Tersedia','Dipinjam','Maintenance') DEFAULT 'Tersedia',
  `gambar` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_lab`, `nama_alat`, `tahun_pengadaan`, `fungsi`, `kondisi`, `status`, `gambar`) VALUES
(1, 2, 'Kit efek Hall', '2015', 'Untuk mengukur tegangan Hall pada plat konduktor', 'Baik', 'Tersedia', '1770364507_b44abcba68970b06e94f.jpeg'),
(2, 2, 'Mikroskop', '2015', 'Melihat benda renik', 'Baik', 'Tersedia', 'default.jpg'),
(3, 4, 'Teleskop Sc 280/2800', '2015', 'Mengamati benda langit', 'Baik', 'Tersedia', 'default.jpg'),
(4, 1, 'Neraca Empat Lengan', '2021', 'Mengukur massa benda', 'Baik', 'Tersedia', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE `laboratorium` (
  `id_lab` int(11) NOT NULL,
  `nama_lab` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT 'default_lab.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`id_lab`, `nama_lab`, `gambar`) VALUES
(1, 'Basic Physics', 'default_lab.jpg'),
(2, 'Advance Physics', 'default_lab.jpg'),
(3, 'Modeling', 'default_lab.jpg'),
(4, 'Astrophysics', 'default_lab.jpg'),
(5, 'Characteristic (Plant Usage)', 'default_lab.jpg'),
(6, 'Instrumentation', 'default_lab.jpg'),
(7, 'Nuclear & Energi', 'default_lab.jpg'),
(8, 'Geophysics', 'default_lab.jpg'),
(9, 'Fisika Material (Fismatel)', 'default_lab.jpg'),
(10, 'Mechanical Workshop', 'default_lab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `kontak_peminjam` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_pengajuan` enum('Pending','Disetujui','Ditolak','Selesai') DEFAULT 'Pending',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_barang`, `nama_peminjam`, `kontak_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `status_pengajuan`, `created_at`) VALUES
(1, 1, 'irfan', '0852', '2026-02-09', '2026-02-10', 'Pending', '2026-02-06 16:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin703');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indexes for table `laboratorium`
--
ALTER TABLE `laboratorium`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laboratorium`
--
ALTER TABLE `laboratorium`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_lab`) REFERENCES `laboratorium` (`id_lab`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

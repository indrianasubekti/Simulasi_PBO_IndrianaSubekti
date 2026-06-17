-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 02:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1c_indrianasubekti`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Arkananta Raditya', 'SMA Highscope Indonesia', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Azkia Khairunnisa', 'SMAN 3 Bandung', '78.00', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Calista Putri', 'SMA Surabaya Intercultural', '92.25', '250000.00', 'Reguler', 'Kedokteran', 'Kampus Barat', NULL, NULL, NULL, NULL),
(4, 'Devanandra Putra', 'SMK Binus Jakarta', '80.10', '250000.00', 'Reguler', 'Teknik Elektro', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eira Hazel', 'SMA Labschool Jakarta', '88.75', '250000.00', 'Reguler', 'Akuntansi', 'Kampus Selatan', NULL, NULL, NULL, NULL),
(6, 'Fathir Alvaro', 'SMAN 1 Medan', '75.50', '250000.00', 'Reguler', 'Manajemen', 'Kampus Selatan', NULL, NULL, NULL, NULL),
(7, 'Gisella Anastasia', 'SMA Global Jaya', '89.00', '250000.00', 'Reguler', 'Ilmu Komunikasi', 'Kampus Barat', NULL, NULL, NULL, NULL),
(8, 'Haikal Kamil', 'SMA Al-Azhar Pusat', '95.00', '150000.00', 'Prestasi', 'Teknik Informatika', NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Ivy Samantha', 'SMA Ciputra Surabaya', '91.50', '150000.00', 'Prestasi', 'Sastra Inggris', NULL, 'Debat Bahasa Inggris', 'Provinsi', NULL, NULL),
(10, 'Jovanka Alexander', 'SMA Kanisius Jakarta', '87.00', '150000.00', 'Prestasi', 'Hukum', NULL, 'Pencak Silat', 'Nasional', NULL, NULL),
(11, 'Keanu Rafif', 'SMAN 1 Kudus', '86.50', '150000.00', 'Prestasi', 'Pendidikan Olahraga', NULL, 'Bulutangkis', 'Internasional', NULL, NULL),
(12, 'Lyodra Ginting', 'SMA Santo Thomas Medan', '84.00', '150000.00', 'Prestasi', 'Seni Musik', NULL, 'Menyanyi Solo', 'Provinsi', NULL, NULL),
(13, 'Mahendra Putra', 'SMAN 1 Yogyakarta', '89.50', '150000.00', 'Prestasi', 'Hubungan Internasional', NULL, 'Karya Ilmiah Remaja', 'Nasional', NULL, NULL),
(14, 'Nadine Alexandra', 'SMA Santa Ursula', '96.00', '150000.00', 'Prestasi', 'Bisnis Digital', NULL, 'Startup Pitching', 'Internasional', NULL, NULL),
(15, 'Oliver Jeremy', 'SMAN 8 Jakarta', '83.25', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-990/IK-DINAS/2026', 'Kementerian Perhubungan'),
(16, 'Prisha Adelia', 'SMAN 2 Padang', '86.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-112/KEDINASAN/2026', 'Badan Siber dan Sandi Negara'),
(17, 'Queenara Sofia', 'SMA Mentari Intercultural', '81.75', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-404/DISDIK/2026', 'Pemerintah Daerah Aceh'),
(18, 'Rayyan Khalif', 'SMAN 3 Semarang', '80.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-701/MENPAN/2026', 'Kementerian PAN-RB'),
(19, 'Shakila Nayla', 'SMAN 1 Makassar', '88.90', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-882/BKN/2026', 'Badan Kepegawaian Negara'),
(20, 'Tristan Alvaro', 'SMA Taruna Nusantara', '85.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-303/KEMENKEU/2026', 'Kementerian Keuangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

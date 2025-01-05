-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2025 at 05:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL,
  `name_admin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `your_email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_admin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `name_admin`, `your_email`, `password_admin`) VALUES
(1, 'arya', 'bagusarya@gmail.com', '$2y$10$hTWGFW2pa3ISJuDcmENqxenJZj8NW6NmRGGc5fSbUUsBUTPCR2EJK'),
(3, 'test', 'test@gmail.com', '$2y$10$2j81kwXCA4jlB6DlkcYBrOeDDEQKdc0vh4KpeCVx/pFjkUhAgawkW'),
(4, 'test.custumer', 'test.custumer@gmail.com', '$2y$10$iaxTBXePhZ3V.gsFsq9DX.wqmjgu11uAXDUt25Jucq//y43Zf1E9C'),
(5, 'rendi prayoga', 'tes1@gmail.com', '$2y$10$NF5IGX2nPwIofYOmxHRQxOd858274XYtyGNMslrisXM9jSggK4ndG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_costumer`
--

CREATE TABLE `tb_costumer` (
  `id_costumer` int NOT NULL,
  `nama-costumer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat-costumer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomer-telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis-kelamin` enum('pria','wanita') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_costumer`
--

INSERT INTO `tb_costumer` (`id_costumer`, `nama-costumer`, `alamat-costumer`, `nomer-telepon`, `jenis-kelamin`) VALUES
(52, 'Herman Gozali', 'Batam', '081236578434', 'pria'),
(54, 'Bagus Nararya', 'Batam', '081236578445', 'pria'),
(56, 'Agung Hermansyah', 'Batam', '081236578445', 'pria'),
(57, 'Herman Gozalis', 'Batam', '081236578445', 'pria'),
(58, 'Basudewa Suputra', 'Batam', '083456797645', 'pria'),
(59, 'Basudewa', 'Batam', '081236578434', ''),
(65, 'Agung Hermansyah', 'Gianyar', '083248845685', 'pria'),
(66, 'test4', 'test5', '000000000000', ''),
(67, 'test4', 'test2', '081253656365', 'pria');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id_mobil` int NOT NULL,
  `gambar-mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `merek-mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga-sewa-nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga-sewa-angka` int DEFAULT NULL,
  `mobil-sopir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bbm` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumblah-penumpang` int DEFAULT NULL,
  `plat-mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `gambar-mobil`, `merek-mobil`, `harga-sewa-nama`, `harga-sewa-angka`, `mobil-sopir`, `bbm`, `jumblah-penumpang`, `plat-mobil`) VALUES
(6, '67624ebc1821a.png', 'Mitsubishi Pajero Sport', 'Rp. 1.400.000/ 1 Hari', 1400000, 'Mobil', 'BBM Penuh', 6, '9876'),
(7, '62b68dca2a4f1.png', 'New Avanza', 'Rp. 400.000/ 1 Hari', 400000, 'Mobil &amp; Sopir', 'BBM Penuh', 5, '7866'),
(8, '62b6f97ec1be9.png', 'New Fortuner', 'Rp. 1.500.000 / 1 Hari', 1500000, 'Mobil &amp; Sopir', 'BBM Penuh', 5, '4535'),
(12, '62b7a82953c1e.png', 'Alphard Transformer', 'Rp. 2.500.000 / 1 Hari', 2500000, 'Mobil &amp; Sopir', 'BBM Penuh', 5, '7864'),
(13, '62b95d527339f.png', 'Hiace Premio', 'Rp. 400.000/ 1 Hari', 400000, 'Mobil &amp; Sopir', 'BBM Penuh', 6, '2343');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_sewa` int NOT NULL,
  `nama-costumer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `merek-mobil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal-awal-sewa` datetime DEFAULT NULL,
  `jangka-waktu-sewa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga-sewa-perhari` int DEFAULT NULL,
  `total-bayar` int DEFAULT NULL,
  `status-sewa` enum('belum bayar','sudah bayar') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_sewa`, `nama-costumer`, `merek-mobil`, `tanggal-awal-sewa`, `jangka-waktu-sewa`, `harga-sewa-perhari`, `total-bayar`, `status-sewa`) VALUES
(5, 'Virgo Rais', 'Alphard', '2022-06-26 00:00:00', '6', 200000, 7000000, 'sudah bayar'),
(6, 'Agung Hermansyah', 'Mitsubishi Pajero', '2022-06-26 00:00:00', '3', 1000000, 7000000, 'belum bayar'),
(7, 'tes10', 'Mitsubishi Pajero', '2022-06-27 00:00:00', '3', 1000000, 7000000, 'belum bayar'),
(12, 'andi', 'avanza', '2025-01-17 00:00:00', '2 hari', 430000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int NOT NULL,
  `your_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `your_email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pwd_user` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `your_name`, `your_email`, `pwd_user`) VALUES
(3, 'bagusarya', 'bagusarya@gmail.com', '$2y$10$DxJMFUEvwv2LoF0VozhZKui0fTaZRigdozRuK1TNy9ykoOQCMcMh6'),
(4, 'dewak', 'dewak22@gmail.com', '$2y$10$9IdFiDtGeq4oNNuQM9sYvezWkWL55gfc.6.lXl6eMTZZ0.7cdgrOe'),
(5, 'arya', 'arya@gmail.com', '$2y$10$vUg4WP3ly64CRWosmAxTZuRQ5/zQ3ng72vSZd9TBnhaX03axnEgCm'),
(6, 'firman', 'firman@gmail.com', '$2y$10$c82HAoRIZWsiMkXFRrtpauOHymUP29L.bDC1mdGgsR5KGnQPJJ49y'),
(7, 'weni', 'weni@gmail.com', '$2y$10$m5HCmu0TREAAKo/zy.NhBunSSOu2OMnRfBbpU2a1UoVnunFZ9uXDS'),
(8, 'firmans', 'firmans@gmail.com', '$2y$10$TGjvIX2hAuA1Oh8LOBXQaOQPfXhyjbrH8DBHhHHpj.4wLryUx0RES'),
(9, 'bagus', 'bagus@gmail.com', '$2y$10$K.zOLE/XFVS2oduID1.QR.h.8yAI5eqZfi0pwCkNd7YALPskXyQ4C'),
(12, 'dewaks', 'dewak23@gmail.com', '$2y$10$P2Iox38paArEXcYLG8OZpOcEQ7qX9zQE3n7kQiqrpe/q/CshimWoK'),
(13, 'bagus ary', 'bagusary@gmail.com', '$2y$10$LN2SbZomQcSuCMxG8Y88Je4MuMk65vD2pv/mE5Eg3RYflTrWQ7daK'),
(14, 'dewa', 'dewa@gmail.com', '$2y$10$FDuJ5V6kEepEw8X2mjLHWOacNvJ9GxdmY7aeJINB1VBLUTRR6XQ.G'),
(15, 'gerry', 'gerry@gmail.com', '$2y$10$qmsSPgeG.mMDYopiKtew6ull5l4QyCHDNuu4z75.GKKnujcmHIi1q'),
(16, 'sovia', 'sovia@gmail.com', '$2y$10$UAbcJmLQ4xmxADS6CvArMeE5XK6FiI10c4rGzmXjFLQgzy0gspGEu'),
(17, 'test', 'test.a@gmail.com', '$2y$10$/D4rar3rHzL/zb.qmU.SeumkC0L877.k0ssf7S7gAZZgY48NKmGVm'),
(18, 'rendi prayoga', 'tes1@gmail.com', '$2y$10$9Y8PbuUs8uyigvtKAys0Eeh7Ic8lflXn1qWbU7rJ1u6j8IJVf6yTe'),
(19, 'wibo kurniawan', 'wibokurniawan@gmail.com', '$2y$10$N3Btw4IsWvptOon4UWE9E.kgdvAen7V.92H89g5wW34r9IlhsRYji');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_costumer`
--
ALTER TABLE `tb_costumer`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_costumer`
--
ALTER TABLE `tb_costumer`
  MODIFY `id_costumer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `id_mobil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_sewa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

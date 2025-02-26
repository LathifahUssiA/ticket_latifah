-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 02:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_lathifah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `password`, `created_at`) VALUES
(1, 'lathifahussi1305@gmail.com', 'lathifah', '$2y$10$T9SkpfFJCglaC5zllmoJM.pFxZLrMI4TfKiMT/oVdgC22wpIJLNTa', '2025-02-25 12:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `akun_mall`
--

CREATE TABLE `akun_mall` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(231) NOT NULL,
  `nama_mall` varchar(231) NOT NULL,
  `nik` varchar(231) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_mall`
--

INSERT INTO `akun_mall` (`id`, `email`, `password`, `nama_mall`, `nik`) VALUES
(4, 'lathifahussi@gmail.com', '123', 'Depok Town Square', ''),
(5, 'lathifahussi@gmail.com', '123', 'Depok Town Square', '');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `banner` varchar(231) NOT NULL,
  `trailer` varchar(231) NOT NULL,
  `nama_film` varchar(231) NOT NULL,
  `judul` longtext NOT NULL,
  `total_menit` varchar(231) NOT NULL,
  `usia` varchar(231) NOT NULL,
  `genre` varchar(231) NOT NULL,
  `dimensi` varchar(231) NOT NULL,
  `producer` varchar(231) NOT NULL,
  `director` varchar(231) NOT NULL,
  `writer` varchar(231) NOT NULL,
  `cast` varchar(231) NOT NULL,
  `distributor` varchar(231) NOT NULL,
  `harga` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `poster`, `banner`, `trailer`, `nama_film`, `judul`, `total_menit`, `usia`, `genre`, `dimensi`, `producer`, `director`, `writer`, `cast`, `distributor`, `harga`) VALUES
(18, 'uploads/poster/Badarawuhi1.jpg', 'uploads/banner/badarawuhi.jpg', 'uploads/trailer/videoplayback.mp4', 'BADARAWUHI DI DESA PENARI', 'Badarawuhi di Desa Penari adalah film horor Indonesia yang merupakan prekuel dari KKN di Desa Penari. Film ini berfokus pada sosok mistis Badarawuhi, penari gaib yang menguasai desa terpencil dengan aura mistisnya. Kisahnya menggali lebih dalam asal-usul dan kekuatan Badarawuhi, serta bagaimana ia memengaruhi orang-orang yang memasuki wilayah terlarangnya. Dengan nuansa mistis, ketegangan, dan kengerian yang lebih intens, film ini mengungkap rahasia kelam desa yang dihantui oleh kekuatan gaib.', '120', '13', 'Horror,Mystery', '3D', 'Manoj Punjabi', 'Kimo Stamboel', 'Lele Laila', 'Aulia Sarah, Maudy Effrosina, Jourdy Pranata, Ardit Erwandha, dll', 'Lionsgate', '35000'),
(19, 'uploads/poster/nanti1.jpg', 'uploads/banner/nanti.jpeg', 'uploads/trailer/WhatsApp Video 2025-02-25 at 11.57.11.mp4', 'Nanti Kita Cerita Tentang Hari Ini', 'Nanti Kita Cerita Tentang Hari Ini mengisahkan tiga saudara yang dibesarkan dengan ekspektasi tinggi, hingga rahasia kelam keluarga mereka terungkap, memicu konflik dan perjalanan emosional menuju pemahaman serta penerimaan diri.', '120 ', '13', 'Drama', '3D', ' Anggia Kharisma', 'Angga Dwimas Sasongko', 'Jenny Jusuf', 'Rio Dewanto, Sheila Dara Aisha, Rachel Amanda, Ardhito Pramono, Donny Damara, Susan Bachtiar', 'Visinema Pictures', '35000');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_film`
--

CREATE TABLE `jadwal_film` (
  `id` int(11) NOT NULL,
  `mall_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `studio` varchar(231) NOT NULL,
  `jam_tayang_1` time NOT NULL,
  `jam_tayang_2` time NOT NULL,
  `jam_tayang_3` time NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `tanggal_akhir_tayang` date NOT NULL,
  `total_menit` varchar(231) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_film`
--

INSERT INTO `jadwal_film` (`id`, `mall_id`, `film_id`, `studio`, `jam_tayang_1`, `jam_tayang_2`, `jam_tayang_3`, `tanggal_tayang`, `tanggal_akhir_tayang`, `total_menit`) VALUES
(8, 4, 18, 'Studio 1', '09:00:00', '12:00:00', '16:00:00', '2025-02-24', '2025-04-25', '120'),
(10, 4, 19, 'Studio 1', '09:00:00', '12:00:00', '16:00:00', '2025-06-25', '2025-07-25', '120 ');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `mall_name` varchar(255) NOT NULL,
  `seat_number` varchar(10) NOT NULL,
  `status` enum('available','occupled') NOT NULL,
  `film_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `mall_name`, `seat_number`, `status`, `film_name`) VALUES
(24, 'Depok Town Square', 'A1', '', 'BADARAWUHI DI DESA PENARI'),
(25, 'Depok Town Square', 'A2', '', 'BADARAWUHI DI DESA PENARI');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `username` varchar(250) NOT NULL,
  `seat_number` varchar(250) NOT NULL,
  `nama_film` varchar(231) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `status`, `payment_type`, `amount`, `transaction_time`, `username`, `seat_number`, `nama_film`) VALUES
(9, 'TIX-1740495475', 'settlement', 'qris', 35000, '2025-02-25 21:57:57', 'lathifahussi1305@gmail.com', 'A1', 'BADARAWUHI DI DESA PENARI'),
(10, 'TIX-1740495508', 'settlement', 'qris', 35000, '2025-02-25 21:58:30', 'lathifahussi1305@gmail.com', 'A2', 'BADARAWUHI DI DESA PENARI');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `created_at`) VALUES
(1, 'lathifahussi1305@gmail.com', 'la', '$2y$10$LejXfHEn6eFrYzLqWs2kbuzZwjTPsTUMG5oHBkx0S.a.j80pU1U8G', '2025-02-13 13:47:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_mall`
--
ALTER TABLE `akun_mall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_film`
--
ALTER TABLE `jadwal_film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `akun_mall`
--
ALTER TABLE `akun_mall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jadwal_film`
--
ALTER TABLE `jadwal_film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

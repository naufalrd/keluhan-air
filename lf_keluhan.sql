-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 11:29 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lf_keluhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL,
  `deskripsi_bidang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `nama_bidang`, `deskripsi_bidang`) VALUES
(1, 'Non Bidang', 'bagian selain bidang'),
(2, 'Jaminan Kualitas', 'devisi yang bertanggung jawab terhadap kualitas produk'),
(3, 'Pembelian', 'devisi yang bertanggung jawab terhadap standar harga produk'),
(4, 'Distribusi', 'devisi yang bertanggung jawab terhadap distribusi produk'),
(6, 'Desain', 'Bertanggun jawab dalam desain produk jadi');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `feedback` longtext NOT NULL,
  `respon` longtext NOT NULL,
  `tanggal_feedback` date NOT NULL,
  `tanggal_respon` date NOT NULL,
  `id_keluhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `feedback`, `respon`, `tanggal_feedback`, `tanggal_respon`, `id_keluhan`) VALUES
(1, 'Baik, terimakasih !', '<p>aaa<br></p>', '0000-00-00', '2021-04-13', 6),
(2, 'Baik, terimakasih !', '<p>wet<br></p>', '0000-00-00', '2021-04-14', 7);

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id_keluhan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` text NOT NULL,
  `keluhan` longtext NOT NULL,
  `tanggal_keluhan` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_pesan` varchar(255) NOT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `rating_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id_keluhan`, `id_user`, `judul`, `keluhan`, `tanggal_keluhan`, `status`, `status_pesan`, `id_bidang`, `rating`, `rating_desc`) VALUES
(6, 1, 'coba ', '<p>coba eror g<br></p>', '2021-04-13', 'Selesai', '', 4, 4, 'hehe'),
(7, 1, 'coba lagi', '<p>aaaaa<br></p>', '2021-04-14', 'Selesai', '', 6, 5, 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL,
  `id_bidang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `id_bidang`) VALUES
(1, 'pelanggan', 1),
(2, 'operator', 1),
(3, 'direktur', 1),
(4, 'bidang', 2),
(5, 'bidang', 3),
(6, 'bidang', 4),
(7, 'bidang', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `alamat` text NOT NULL,
  `id_level` int(11) NOT NULL,
  `rate` int(1) DEFAULT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email_user`, `nama_depan`, `nama_belakang`, `username`, `password`, `no_hp`, `alamat`, `id_level`, `rate`, `review`) VALUES
(1, 'pelanggan@gmail.com', 'Pelanggan', 'Ganteng', 'pelanggan', '$2y$10$3oUer2/aJCDDivhDDMolgOu2G.1wkVqQsmAMk2lr45nxDjJX64m6a', '085544123900', 'Jl Kenari', 1, 3, 'jele'),
(2, 'operator@gmail.com', 'Operator', 'Ganteng', 'operator', '$2y$10$IdtLRUf/1tBtAC/OwbzkKuPvw6aiAxtSWGjT3mKG.SDEU.TypcQMK', '085544123901', 'Sleman', 2, 0, ''),
(3, 'direktur@gmail.com', 'Direktur', 'Cantik', 'direktur', '$2y$10$r.69/AILh0MgH3t9gCKb2OTGsxajorJi02oUqJ1qS1Ld1c0BPHOJe', '085544123902', 'lalalalala', 3, 0, ''),
(5, 'jaminankualitas@gmail.com', 'Jaminan', 'Kualitas', 'bidang', '$2y$10$weKKadN3D/uwvqxCvQBd2OWI39VlaaqYjVZpG2B6JlLu3XzQv0EAm', '085544123903', 'bidang', 4, 0, ''),
(10, 'distribusi@gmail.com', 'bang', 'distribusi', 'distribusi', '$2y$10$tbCGXCktWaZNLhiwOnmDnOUNttobxD2tsT/OjlL4P0rOrFi5XlhJC', '008', 'distribusi', 6, 0, ''),
(11, 'desain@gmail.com', 'desain', 'desain', 'desain', '$2y$10$BTJMg068Rc7VbH255PBOWOM6KA4jkmTLpfvgdLc2uDVdcFym4mxfa', '099', 'desain', 7, 0, ''),
(12, 'pelangganlagi@gmail.com', 'pelanggan', 'lagi', 'pelangganlagi', '$2y$10$3QDdaR7FuJjvKRo0sscXG.VnEtwnZu0R3VGPKwhorJFH2ebZbMk1O', '08111111180', 'jogja', 1, 5, 'bgus bged');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `id_keluhan` (`id_keluhan`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_keluhan`) REFERENCES `keluhan` (`id_keluhan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD CONSTRAINT `keluhan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `keluhan_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
